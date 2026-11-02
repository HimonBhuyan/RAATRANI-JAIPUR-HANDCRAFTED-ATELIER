<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    /**
     * Show Cart page.
     */
    public function index(): View
    {
        $items = $this->cartService->getItems();
        $subtotal = $this->cartService->getSubtotal();
        $discount = $this->cartService->getDiscount();
        $shipping = $this->cartService->getShippingFee();
        $grandTotal = $this->cartService->getGrandTotal();
        $freeShippingRemaining = $this->cartService->getFreeShippingRemaining();
        $freeShippingProgress = $this->cartService->getFreeShippingProgress();
        $coupon = $this->cartService->getCoupon();

        return view('pages.cart', compact(
            'items',
            'subtotal',
            'discount',
            'shipping',
            'grandTotal',
            'freeShippingRemaining',
            'freeShippingProgress',
            'coupon'
        ));
    }

    /**
     * Add product to cart.
     */
    public function add(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:20'],
            'option' => ['nullable', 'string', 'max:100'],
        ]);

        $quantity = $validated['quantity'] ?? 1;
        $option = $validated['option'] ?? null;

        $result = $this->cartService->add($validated['product_id'], $quantity, $option);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item added to your bag!',
                'data' => $result,
                'drawer_html' => view('components.cart-drawer-content', [
                    'items' => $this->cartService->getItems(),
                    'subtotal' => $this->cartService->getSubtotal(),
                    'discount' => $this->cartService->getDiscount(),
                    'shipping' => $this->cartService->getShippingFee(),
                    'grandTotal' => $this->cartService->getGrandTotal(),
                    'freeShippingRemaining' => $this->cartService->getFreeShippingRemaining(),
                    'freeShippingProgress' => $this->cartService->getFreeShippingProgress(),
                    'coupon' => $this->cartService->getCoupon(),
                ])->render(),
            ]);
        }

        return redirect()->back()->with('success', 'Item added to your bag!');
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'cart_key' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:0', 'max:50'],
        ]);

        $result = $this->cartService->update($validated['cart_key'], $validated['quantity']);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $result,
                'drawer_html' => view('components.cart-drawer-content', [
                    'items' => $this->cartService->getItems(),
                    'subtotal' => $this->cartService->getSubtotal(),
                    'discount' => $this->cartService->getDiscount(),
                    'shipping' => $this->cartService->getShippingFee(),
                    'grandTotal' => $this->cartService->getGrandTotal(),
                    'freeShippingRemaining' => $this->cartService->getFreeShippingRemaining(),
                    'freeShippingProgress' => $this->cartService->getFreeShippingProgress(),
                    'coupon' => $this->cartService->getCoupon(),
                ])->render(),
            ]);
        }

        return redirect()->back()->with('success', 'Bag updated.');
    }

    /**
     * Remove item from cart.
     */
    public function remove(Request $request, string $cartKey): JsonResponse|RedirectResponse
    {
        $result = $this->cartService->remove($cartKey);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from bag.',
                'data' => $result,
                'drawer_html' => view('components.cart-drawer-content', [
                    'items' => $this->cartService->getItems(),
                    'subtotal' => $this->cartService->getSubtotal(),
                    'discount' => $this->cartService->getDiscount(),
                    'shipping' => $this->cartService->getShippingFee(),
                    'grandTotal' => $this->cartService->getGrandTotal(),
                    'freeShippingRemaining' => $this->cartService->getFreeShippingRemaining(),
                    'freeShippingProgress' => $this->cartService->getFreeShippingProgress(),
                    'coupon' => $this->cartService->getCoupon(),
                ])->render(),
            ]);
        }

        return redirect()->back()->with('success', 'Item removed from bag.');
    }

    /**
     * Apply coupon code.
     */
    public function applyCoupon(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate(['code' => ['required', 'string', 'max:50']]);

        $res = $this->cartService->applyCoupon($request->input('code'));

        if ($request->wantsJson()) {
            return response()->json($res);
        }

        return redirect()->back()->with(
            $res['success'] ? 'success' : 'error',
            $res['message']
        );
    }

    /**
     * Remove applied coupon.
     */
    public function removeCoupon(): RedirectResponse
    {
        $this->cartService->removeCoupon();

        return redirect()->back()->with('success', 'Coupon removed.');
    }

    /**
     * Return cart drawer content HTML.
     */
    public function drawer(): View
    {
        return view('components.cart-drawer-content', [
            'items' => $this->cartService->getItems(),
            'subtotal' => $this->cartService->getSubtotal(),
            'discount' => $this->cartService->getDiscount(),
            'shipping' => $this->cartService->getShippingFee(),
            'grandTotal' => $this->cartService->getGrandTotal(),
            'freeShippingRemaining' => $this->cartService->getFreeShippingRemaining(),
            'freeShippingProgress' => $this->cartService->getFreeShippingProgress(),
            'coupon' => $this->cartService->getCoupon(),
        ]);
    }
}
