<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    /**
     * Show Checkout page.
     */
    public function index(): View|RedirectResponse
    {
        $items = $this->cartService->getItems();

        if (empty($items)) {
            return redirect()->route('shop.index')->with('error', 'Your shopping bag is empty.');
        }

        $subtotal = $this->cartService->getSubtotal();
        $discount = $this->cartService->getDiscount();
        $shipping = $this->cartService->getShippingFee();
        $grandTotal = $this->cartService->getGrandTotal();
        $coupon = $this->cartService->getCoupon();
        $user = Auth::user();

        return view('pages.checkout', compact(
            'items',
            'subtotal',
            'discount',
            'shipping',
            'grandTotal',
            'coupon',
            'user'
        ));
    }

    /**
     * Process order submission.
     */
    public function process(Request $request): RedirectResponse
    {
        $items = $this->cartService->getItems();
        if (empty($items)) {
            return redirect()->route('shop.index')->with('error', 'Your bag is empty.');
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'shipping_address' => ['required', 'string', 'max:500'],
            'shipping_city' => ['required', 'string', 'max:100'],
            'shipping_state' => ['required', 'string', 'max:100'],
            'shipping_pincode' => ['required', 'string', 'max:10'],
            'payment_method' => ['required', 'in:cod,upi_card,whatsapp'],
            'shipping_method' => ['nullable', 'string'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $subtotal = $this->cartService->getSubtotal();
        $discount = $this->cartService->getDiscount();
        $coupon = $this->cartService->getCoupon();
        $shippingFee = $this->cartService->getShippingFee();
        $grandTotal = $this->cartService->getGrandTotal();

        $order = DB::transaction(function () use ($validated, $items, $subtotal, $discount, $coupon, $shippingFee, $grandTotal) {
            $orderNumber = Order::generateOrderNumber();

            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => Auth::id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'shipping_address' => $validated['shipping_address'],
                'shipping_city' => $validated['shipping_city'],
                'shipping_state' => $validated['shipping_state'],
                'shipping_pincode' => $validated['shipping_pincode'],
                'shipping_country' => 'India',
                'shipping_method' => $validated['shipping_method'] ?? 'Standard Express',
                'shipping_fee' => $shippingFee,
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_method'] === 'upi_card' ? 'paid' : 'pending',
                'order_status' => 'confirmed',
                'subtotal' => $subtotal,
                'discount_amount' => $discount,
                'coupon_code' => $coupon?->code,
                'tax_amount' => 0.00,
                'grand_total' => $grandTotal,
                'notes' => $validated['notes'] ?? null,
                'tracking_number' => 'DELHIVERY'.rand(10000000, 99999999),
                'courier_partner' => 'Delhivery Surface / Express',
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['name'],
                    'product_price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'selected_option' => $item['option'],
                    'subtotal' => $item['price'] * $item['quantity'],
                    'image' => $item['image'],
                ]);

                // Decrement product stock
                Product::where('id', $item['product_id'])->decrement('stock_quantity', $item['quantity']);
            }

            return $order;
        });

        // Clear cart
        $this->cartService->clear();

        return redirect()->route('checkout.confirmation', ['order_number' => $order->order_number])
            ->with('success', 'Thank you! Your order has been placed successfully.');
    }

    /**
     * Show Order Confirmation / Success receipt page.
     */
    public function confirmation(string $orderNumber): View
    {
        $order = Order::with('items.product')->where('order_number', $orderNumber)->firstOrFail();

        return view('pages.order-confirmation', compact('order'));
    }
}
