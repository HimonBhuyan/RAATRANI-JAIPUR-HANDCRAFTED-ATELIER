<x-layouts.admin header="Discount Coupon Management">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- New Coupon Form (4 cols) -->
        <div class="lg:col-span-4 bg-white rounded-xl border border-stone-200 p-6 shadow-xs space-y-4">
            <h3 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3">Create New Coupon</h3>
            
            <form action="{{ route('admin.coupons.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Coupon Code *</label>
                    <input type="text" name="code" required placeholder="e.g. FESTIVE20" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg uppercase tracking-wider font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Discount Type *</label>
                    <select name="type" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg font-semibold">
                        <option value="percent">Percentage Discount (%)</option>
                        <option value="fixed">Fixed Amount Off (₹)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Discount Value *</label>
                    <input type="number" step="0.01" name="value" required placeholder="e.g. 10 for 10% or 500 for ₹500" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Minimum Order Spend (₹)</label>
                    <input type="number" step="0.01" name="min_spend" placeholder="e.g. 1999 (0 for no limit)" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Expires At (Optional)</label>
                    <input type="date" name="expires_at" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <button type="submit" class="w-full py-2.5 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                    Create Coupon
                </button>
            </form>
        </div>

        <!-- Coupons List (8 cols) -->
        <div class="lg:col-span-8 bg-white rounded-xl border border-stone-200 overflow-hidden shadow-xs">
            <div class="p-4 border-b border-stone-200 font-serif font-bold text-sm text-stone-900">
                Active & Past Coupons
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-stone-50 text-stone-500 uppercase font-bold border-b border-stone-200">
                            <th class="p-3.5">Code</th>
                            <th class="p-3.5">Discount</th>
                            <th class="p-3.5">Min Spend</th>
                            <th class="p-3.5">Status</th>
                            <th class="p-3.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($coupons as $coup)
                            <tr class="hover:bg-stone-50/60 transition">
                                <td class="p-3.5 font-mono font-bold text-stone-900">{{ $coup->code }}</td>
                                <td class="p-3.5 font-semibold text-stone-800">
                                    {{ $coup->type === 'percent' ? $coup->value . '%' : '₹' . number_format($coup->value, 2) }} OFF
                                </td>
                                <td class="p-3.5 text-stone-600">
                                    {{ $coup->min_spend > 0 ? '₹' . number_format($coup->min_spend, 2) : 'No Minimum' }}
                                </td>
                                <td class="p-3.5">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $coup->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-200 text-stone-700' }}">
                                        {{ $coup->is_active ? 'Active' : 'Disabled' }}
                                    </span>
                                </td>
                                <td class="p-3.5 text-right space-x-2">
                                    <form action="{{ route('admin.coupons.toggle', $coup) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-xs font-semibold text-amber-800 hover:underline">
                                            {{ $coup->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.coupons.destroy', $coup) }}" method="POST" class="inline" onsubmit="return confirm('Delete this coupon?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-rose-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>

