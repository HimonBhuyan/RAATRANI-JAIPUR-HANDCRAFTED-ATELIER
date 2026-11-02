<x-layouts.admin header="Customer Orders Management">
    <div class="space-y-6">
        <!-- Filter Toolbar -->
        <div class="bg-white p-4 rounded-xl border border-stone-200 flex flex-wrap items-center justify-between gap-4">
            <form action="{{ route('admin.orders.index') }}" method="GET" class="flex flex-wrap items-center gap-3 text-xs">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search Order # or customer..." 
                    class="px-3.5 py-2 bg-stone-50 border border-stone-300 rounded-lg w-56 sm:w-72"
                >
                <select name="status" onchange="this.form.submit()" class="px-3.5 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-stone-900 text-white rounded-lg font-semibold">Search</button>
            </form>
        </div>

        <!-- Orders Table -->
        <div class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-stone-50 text-stone-500 uppercase font-bold border-b border-stone-200">
                            <th class="p-3.5">Order</th>
                            <th class="p-3.5">Date</th>
                            <th class="p-3.5">Customer</th>
                            <th class="p-3.5">City & Phone</th>
                            <th class="p-3.5">Payment</th>
                            <th class="p-3.5">Total</th>
                            <th class="p-3.5">Order Status</th>
                            <th class="p-3.5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($orders as $ord)
                            <tr class="hover:bg-stone-50/60 transition">
                                <td class="p-3.5 font-mono font-bold text-stone-900">#{{ $ord->order_number }}</td>
                                <td class="p-3.5 text-stone-500">{{ $ord->created_at->format('M d, Y') }}</td>
                                <td class="p-3.5">
                                    <p class="font-bold text-stone-900">{{ $ord->customer_name }}</p>
                                    <p class="text-[11px] text-stone-400">{{ $ord->customer_email }}</p>
                                </td>
                                <td class="p-3.5 text-stone-700">
                                    <p>{{ $ord->shipping_city }}</p>
                                    <p class="text-[11px] text-stone-400">{{ $ord->customer_phone }}</p>
                                </td>
                                <td class="p-3.5">
                                    <span class="block uppercase font-semibold text-[10px] text-stone-600">{{ $ord->payment_method }}</span>
                                    <span class="inline-block px-1.5 py-0.5 rounded text-[9px] font-bold uppercase {{ $ord->payment_status === 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-900' }}">
                                        {{ $ord->payment_status }}
                                    </span>
                                </td>
                                <td class="p-3.5 font-bold text-stone-900 text-sm">₹{{ number_format($ord->grand_total, 2) }}</td>
                                <td class="p-3.5">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase 
                                        @if($ord->order_status === 'delivered') bg-emerald-100 text-emerald-800 
                                        @elseif($ord->order_status === 'shipped') bg-amber-100 text-amber-900 
                                        @else bg-stone-100 text-stone-800 @endif">
                                        {{ $ord->order_status }}
                                    </span>
                                </td>
                                <td class="p-3.5 text-right">
                                    <a href="{{ route('admin.orders.show', $ord) }}" class="px-3 py-1.5 bg-stone-900 text-white rounded text-[11px] font-semibold hover:bg-stone-800 transition">
                                        View / Ship
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-8 text-center text-stone-500">No customer orders matching the criteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-stone-200">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>

