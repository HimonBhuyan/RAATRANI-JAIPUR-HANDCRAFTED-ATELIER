<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    private const SESSION_KEY = 'raatrani_cart';

    private const COUPON_KEY = 'raatrani_applied_coupon';

    public const FREE_SHIPPING_THRESHOLD = 1999.00;

    public const STANDARD_SHIPPING_FEE = 150.00;

    /**
     * Get all cart items from session.
     *
     * @return array<string, array<string, mixed>>
     */
    public function getItems(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Add a product to the cart.
     *
     * @return array<string, mixed>
     */
    public function add(int $productId, int $quantity = 1, ?string $option = null): array
    {
        $product = Product::findOrFail($productId);
        $cart = $this->getItems();

        $optionKey = $option ? trim($option) : 'default';
        $cartKey = $productId.'_'.md5($optionKey);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'cart_key' => $cartKey,
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'option' => $option,
                'image' => $product->primary_image,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);

        return [
            'item' => $cart[$cartKey],
            'count' => $this->getItemCount(),
            'subtotal' => $this->getSubtotal(),
            'grand_total' => $this->getGrandTotal(),
        ];
    }

    /**
     * Update quantity of a cart item.
     */
    public function update(string $cartKey, int $quantity): array
    {
        $cart = $this->getItems();

        if (isset($cart[$cartKey])) {
            if ($quantity <= 0) {
                unset($cart[$cartKey]);
            } else {
                $cart[$cartKey]['quantity'] = $quantity;
            }
            Session::put(self::SESSION_KEY, $cart);
        }

        return [
            'count' => $this->getItemCount(),
            'subtotal' => $this->getSubtotal(),
            'grand_total' => $this->getGrandTotal(),
        ];
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(string $cartKey): array
    {
        $cart = $this->getItems();

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            Session::put(self::SESSION_KEY, $cart);
        }

        return [
            'count' => $this->getItemCount(),
            'subtotal' => $this->getSubtotal(),
            'grand_total' => $this->getGrandTotal(),
        ];
    }

    /**
     * Clear all cart items and applied coupons.
     */
    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
        Session::forget(self::COUPON_KEY);
    }

    /**
     * Total number of items in cart.
     */
    public function getItemCount(): int
    {
        $count = 0;
        foreach ($this->getItems() as $item) {
            $count += $item['quantity'];
        }

        return $count;
    }

    /**
     * Subtotal of items in cart.
     */
    public function getSubtotal(): float
    {
        $subtotal = 0.0;
        foreach ($this->getItems() as $item) {
            $subtotal += ($item['price'] * $item['quantity']);
        }

        return round($subtotal, 2);
    }

    /**
     * Get active applied coupon.
     */
    public function getCoupon(): ?Coupon
    {
        $code = Session::get(self::COUPON_KEY);
        if (! $code) {
            return null;
        }

        $coupon = Coupon::where('code', $code)->where('is_active', true)->first();
        if ($coupon && $coupon->isValidFor($this->getSubtotal())) {
            return $coupon;
        }

        $this->removeCoupon();

        return null;
    }

    /**
     * Apply coupon code.
     *
     * @return array{success: bool, message: string, discount: float}
     */
    public function applyCoupon(string $code): array
    {
        $code = strtoupper(trim($code));
        $coupon = Coupon::where('code', $code)->where('is_active', true)->first();

        if (! $coupon) {
            return [
                'success' => false,
                'message' => 'Invalid or expired coupon code.',
                'discount' => 0.0,
            ];
        }

        $subtotal = $this->getSubtotal();
        if ($coupon->min_spend > 0 && $subtotal < (float) $coupon->min_spend) {
            return [
                'success' => false,
                'message' => 'This coupon requires a minimum spend of ₹'.number_format($coupon->min_spend, 2).'.',
                'discount' => 0.0,
            ];
        }

        Session::put(self::COUPON_KEY, $coupon->code);

        return [
            'success' => true,
            'message' => "Coupon '{$coupon->code}' applied successfully!",
            'discount' => $coupon->calculateDiscount($subtotal),
        ];
    }

    /**
     * Remove applied coupon.
     */
    public function removeCoupon(): void
    {
        Session::forget(self::COUPON_KEY);
    }

    /**
     * Calculate current discount amount.
     */
    public function getDiscount(): float
    {
        $coupon = $this->getCoupon();
        if (! $coupon) {
            return 0.0;
        }

        return $coupon->calculateDiscount($this->getSubtotal());
    }

    /**
     * Calculate shipping charge.
     */
    public function getShippingFee(): float
    {
        $subtotal = $this->getSubtotal();
        if ($subtotal == 0 || $subtotal >= self::FREE_SHIPPING_THRESHOLD) {
            return 0.0;
        }

        return self::STANDARD_SHIPPING_FEE;
    }

    /**
     * Amount remaining to unlock free shipping.
     */
    public function getFreeShippingRemaining(): float
    {
        $subtotal = $this->getSubtotal();
        if ($subtotal >= self::FREE_SHIPPING_THRESHOLD) {
            return 0.0;
        }

        return round(self::FREE_SHIPPING_THRESHOLD - $subtotal, 2);
    }

    /**
     * Free shipping percentage progress (0 - 100).
     */
    public function getFreeShippingProgress(): int
    {
        $subtotal = $this->getSubtotal();
        if ($subtotal >= self::FREE_SHIPPING_THRESHOLD) {
            return 100;
        }

        return min(100, (int) round(($subtotal / self::FREE_SHIPPING_THRESHOLD) * 100));
    }

    /**
     * Final payable total.
     */
    public function getGrandTotal(): float
    {
        $subtotal = $this->getSubtotal();
        if ($subtotal <= 0) {
            return 0.0;
        }

        $discount = $this->getDiscount();
        $shipping = $this->getShippingFee();

        return max(0.0, round($subtotal - $discount + $shipping, 2));
    }
}
