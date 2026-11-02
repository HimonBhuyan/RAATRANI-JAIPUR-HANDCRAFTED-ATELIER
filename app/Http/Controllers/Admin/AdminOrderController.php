<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * List all customer orders.
     */
    public function index(Request $request): View
    {
        $query = Order::with('items')->latest();

        if ($request->filled('status')) {
            $query->where('order_status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('order_number', 'like', "%{$s}%")
                    ->orWhere('customer_name', 'like', "%{$s}%")
                    ->orWhere('customer_phone', 'like', "%{$s}%")
                    ->orWhere('customer_email', 'like', "%{$s}%");
            });
        }

        $orders = $query->paginate(15)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show single order details.
     */
    public function show(Order $order): View
    {
        $order->load(['items.product', 'user']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status & fulfillment.
     */
    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'order_status' => ['required', 'in:pending,confirmed,processing,shipped,delivered,cancelled'],
            'payment_status' => ['required', 'in:pending,paid,refunded'],
            'tracking_number' => ['nullable', 'string', 'max:100'],
            'courier_partner' => ['nullable', 'string', 'max:100'],
        ]);

        $order->update($validated);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
