<x-layouts.admin header="Add New Handcrafted Product">
    <div class="max-w-4xl bg-white rounded-xl border border-stone-200 p-8 shadow-xs">
        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Product Title *</label>
                    <input type="text" name="name" required value="{{ old('name') }}" placeholder="e.g. Hand Block Printed Cotton Quilted Jacket - Blush Rose" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Category *</label>
                    <select name="category_id" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Signature Collection (Optional)</label>
                    <select name="product_collection_id" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                        <option value="">None / General Collection</option>
                        @foreach($collections as $col)
                            <option value="{{ $col->id }}">{{ $col->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">SKU (Unique Code) *</label>
                    <input type="text" name="sku" required value="{{ old('sku', 'RT-CL-' . rand(10, 99)) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Inventory Stock Quantity *</label>
                    <input type="number" name="stock_quantity" required value="{{ old('stock_quantity', 15) }}" min="0" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Selling Price (₹) *</label>
                    <input type="number" step="0.01" name="price" required value="{{ old('price') }}" placeholder="2499.00" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Compare At / Original MRP (₹)</label>
                    <input type="number" step="0.01" name="compare_at_price" value="{{ old('compare_at_price') }}" placeholder="2999.00" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Primary Image Path *</label>
                    <input type="text" name="primary_image" required value="{{ old('primary_image', 'images/products/jacket-quilted-pink.jpg') }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Craft Technique</label>
                    <input type="text" name="craft_technique" value="{{ old('craft_technique', 'Jaipur Hand Block Print & Kantha Stitch') }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Material Composition</label>
                    <input type="text" name="material" value="{{ old('material', '100% Pure Organic Cotton') }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Dimensions & Sizing Info</label>
                    <input type="text" name="dimensions_info" value="{{ old('dimensions_info', 'King 108 x 108 inches') }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Wash Care Instructions</label>
                    <input type="text" name="wash_care" value="{{ old('wash_care', 'Gentle cold hand wash or delicate cycle. Dry in shade.') }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Short Tagline / Summary</label>
                    <input type="text" name="short_description" value="{{ old('short_description') }}" placeholder="Brief 1-sentence teaser..." class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Full Detailed Story & Description *</label>
                    <textarea name="description" rows="4" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">{{ old('description') }}</textarea>
                </div>

                <!-- Product Display Flags -->
                <div class="sm:col-span-2 flex flex-wrap gap-6 pt-2 border-t border-stone-200">
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" class="rounded text-amber-700">
                        <span>Featured on Homepage</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_new_arrival" value="1" checked class="rounded text-amber-700">
                        <span>New Drop Arrival</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_bestseller" value="1" class="rounded text-amber-700">
                        <span>Bestseller Badge</span>
                    </label>
                </div>
            </div>

            <div class="pt-4 border-t border-stone-200 flex gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 border border-stone-300 text-stone-700 rounded-lg text-xs font-semibold uppercase tracking-wider">Cancel</a>
                <button type="submit" class="px-7 py-2.5 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>

