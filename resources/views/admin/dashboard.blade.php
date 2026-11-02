<x-layouts.admin header="Overview Dashboard">
    <div class="space-y-8">
        <!-- Stat Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white p-5 rounded-xl border border-stone-200 shadow-xs">
                <span class="text-xs uppercase font-bold text-stone-400 tracking-wider">Total Revenue</span>
                <p class="font-serif text-2xl font-bold text-stone-900 mt-1">₹{{ number_format($totalRevenue, 2) }}</p>
                <span class="text-[11px] text-emerald-700 font-semibold mt-1 block">From confirmed payments</span>
            </div>

            <div class="bg-white p-5 rounded-xl border border-stone-200 shadow-xs">
                <span class="text-xs uppercase font-bold text-stone-400 tracking-wider">Total Orders</span>
                <p class="font-serif text-2xl font-bold text-stone-900 mt-1">{{ $totalOrders }}</p>
                <span class="text-[11px] text-amber-800 font-semibold mt-1 block">{{ $pendingOrders }} pending fulfillment</span>
            </div>

            <div class="bg-white p-5 rounded-xl border border-stone-200 shadow-xs">
                <span class="text-xs uppercase font-bold text-stone-400 tracking-wider">Catalog Products</span>
                <p class="font-serif text-2xl font-bold text-stone-900 mt-1">{{ $totalProducts }}</p>
                <span class="text-[11px] text-stone-500 mt-1 block">Active across 10 categories</span>
            </div>

            <div class="bg-white p-5 rounded-xl border border-stone-200 shadow-xs">
                <span class="text-xs uppercase font-bold text-stone-400 tracking-wider">Inquiries & Leads</span>
                <p class="font-serif text-2xl font-bold text-stone-900 mt-1">{{ $unreadInquiries }}</p>
                <span class="text-[11px] text-amber-800 font-semibold mt-1 block">Unread gifting & custom leads</span>
            </div>
        </div>

        <!-- Recent Orders & Inventory Alerts -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Recent Orders (8 cols) -->
            <div class="lg:col-span-8 bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-stone-100">
                    <h3 class="font-serif text-base font-bold text-stone-900">Recent Customer Orders</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-xs text-amber-800 font-bold hover:underline">View All Orders →</a>
                </div>

                @if($recentOrders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="text-stone-400 uppercase font-semibold border-b border-stone-100">
                                    <th class="pb-2">Order</th>
                                    <th class="pb-2">Customer</th>
                                    <th class="pb-2">Items</th>
                                    <th class="pb-2">Total</th>
                                    <th class="pb-2">Status</th>
                                    <th class="pb-2 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-100">
                                @foreach($recentOrders as $ord)
                                    <tr>
                                        <td class="py-3 font-mono font-bold text-stone-900">#{{ $ord->order_number }}</td>
                                        <td class="py-3">
                                            <p class="font-semibold text-stone-900">{{ $ord->customer_name }}</p>
                                            <p class="text-[11px] text-stone-400">{{ $ord->shipping_city }}</p>
                                        </td>
                                        <td class="py-3 text-stone-600">{{ $ord->items->count() }} items</td>
                                        <td class="py-3 font-bold text-stone-900">₹{{ number_format($ord->grand_total, 2) }}</td>
                                        <td class="py-3">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase 
                                                @if($ord->order_status === 'delivered') bg-emerald-100 text-emerald-800 
                                                @elseif($ord->order_status === 'shipped') bg-amber-100 text-amber-900 
                                                @else bg-stone-100 text-stone-800 @endif">
                                                {{ $ord->order_status }}
                                            </span>
                                        </td>
                                        <td class="py-3 text-right">
                                            <a href="{{ route('admin.orders.show', $ord) }}" class="text-xs font-semibold text-amber-800 hover:underline">Manage</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-xs text-stone-500 py-6 text-center">No orders placed yet.</p>
                @endif
            </div>

            <!-- Quick Product Actions & Low Stock (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Quick Product Launch CTA -->
                <div class="bg-amber-900 text-white rounded-xl p-5 shadow-xs space-y-3">
                    <h3 class="font-serif text-lg font-bold">Add New Design</h3>
                    <p class="text-xs text-amber-200 leading-relaxed">Publish new block-printed robes, bedsheets, quilts, or accessories into the catalog.</p>
                    <a href="{{ route('admin.products.create') }}" class="inline-block px-4 py-2 bg-white text-stone-900 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-amber-100 transition">
                        + Create Product
                    </a>
                </div>

                <!-- Low Stock Alert -->
                <div class="bg-white rounded-xl border border-stone-200 p-5 shadow-xs">
                    <h3 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-3">Inventory Watch</h3>
                    @if($lowStockProducts->count() > 0)
                        <div class="space-y-2.5 text-xs">
                            @foreach($lowStockProducts as $lp)
                                <div class="flex items-center justify-between pb-2 border-b border-stone-100">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset($lp->primary_image) }}" class="w-8 h-10 object-cover rounded">
                                        <span class="font-medium text-stone-800 truncate max-w-[140px]">{{ $lp->name }}</span>
                                    </div>
                                    <span class="font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded text-[10px]">
                                        {{ $lp->stock_quantity }} left
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-emerald-700 font-medium">✓ All products have healthy inventory levels.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>

