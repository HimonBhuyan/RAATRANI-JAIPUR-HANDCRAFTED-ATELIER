<x-layouts.admin header="Product Catalog Management">
    <div class="space-y-6">
        <!-- Top Toolbar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-xl border border-stone-200">
            <!-- Filter by category or search -->
            <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-wrap items-center gap-3 text-xs">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search name or SKU..." 
                    class="px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg w-48 sm:w-64"
                >
                <select name="category" onchange="this.form.submit()" class="px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-3 py-2 bg-stone-900 text-white rounded-lg font-semibold">Filter</button>
            </form>

            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition text-center shrink-0">
                + Add New Product
            </a>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-stone-50 text-stone-500 uppercase font-bold border-b border-stone-200">
                            <th class="p-3.5">Product</th>
                            <th class="p-3.5">Category</th>
                            <th class="p-3.5">SKU</th>
                            <th class="p-3.5">Price</th>
                            <th class="p-3.5">Stock</th>
                            <th class="p-3.5">Flags</th>
                            <th class="p-3.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($products as $prod)
                            <tr class="hover:bg-stone-50/60 transition">
                                <td class="p-3.5">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset($prod->primary_image) }}" alt="{{ $prod->name }}" class="w-10 h-12 object-cover rounded bg-stone-100 border border-stone-200 shrink-0">
                                        <div>
                                            <a href="{{ route('shop.product', $prod->slug) }}" target="_blank" class="font-bold text-stone-900 hover:text-amber-800 transition line-clamp-1">
                                                {{ $prod->name }}
                                            </a>
                                            <span class="text-[11px] text-stone-400">{{ $prod->craft_technique }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3.5 text-stone-700 font-medium">{{ $prod->category?->name }}</td>
                                <td class="p-3.5 font-mono text-stone-600 font-bold">{{ $prod->sku }}</td>
                                <td class="p-3.5 font-bold text-stone-900">
                                    ₹{{ number_format($prod->price, 2) }}
                                    @if($prod->compare_at_price)
                                        <span class="text-[10px] text-stone-400 line-through block">₹{{ number_format($prod->compare_at_price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="p-3.5 font-semibold {{ $prod->stock_quantity <= 5 ? 'text-rose-600' : 'text-stone-700' }}">
                                    {{ $prod->stock_quantity }} pcs
                                </td>
                                <td class="p-3.5 space-y-0.5">
                                    @if($prod->is_featured) <span class="px-1.5 py-0.5 bg-amber-100 text-amber-900 rounded text-[9px] font-bold uppercase block w-max">Featured</span> @endif
                                    @if($prod->is_new_arrival) <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-900 rounded text-[9px] font-bold uppercase block w-max">New Drop</span> @endif
                                    @if($prod->is_bestseller) <span class="px-1.5 py-0.5 bg-stone-900 text-white rounded text-[9px] font-bold uppercase block w-max">Bestseller</span> @endif
                                </td>
                                <td class="p-3.5 text-right space-x-2">
                                    <a href="{{ route('admin.products.edit', $prod) }}" class="text-amber-800 font-bold hover:underline">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $prod) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:underline cursor-pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-stone-200">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>

