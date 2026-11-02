<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display admin overview metrics and recent activity.
     */
    public function index(): View
    {
        $totalRevenue = Order::where('payment_status', 'paid')->sum('grand_total');
        $totalOrders = Order::count();
        $pendingOrders = Order::whereIn('order_status', ['pending', 'confirmed'])->count();
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock_quantity', '<=', 5)->get();
        $recentOrders = Order::with('items')->latest()->take(10)->get();
        $unreadInquiries = ContactMessage::where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'pendingOrders',
            'totalProducts',
            'lowStockProducts',
            'recentOrders',
            'unreadInquiries'
        ));
    }
}
