<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    /**
     * Show tracking lookup page.
     */
    public function index(): View
    {
        return view('pages.track-order');
    }

    /**
     * Search and display order tracking timeline.
     */
    public function track(Request $request): View
    {
        $validated = $request->validate([
            'order_number' => ['required', 'string'],
            'identifier' => ['required', 'string'], // email or phone
        ]);

        $orderNumber = strtoupper(trim($validated['order_number']));
        $identifier = trim($validated['identifier']);

        $order = Order::with('items')
            ->where('order_number', $orderNumber)
            ->where(function ($q) use ($identifier) {
                $q->where('customer_email', $identifier)
                    ->orWhere('customer_phone', 'like', "%{$identifier}%");
            })
            ->first();

        return view('pages.track-order', [
            'order' => $order,
            'searched' => true,
            'orderNumber' => $orderNumber,
        ]);
    }
}
