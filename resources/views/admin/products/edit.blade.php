<x-layouts.admin :header="'Edit: ' . $product->name">
    <div class="max-w-4xl bg-white rounded-xl border border-stone-200 p-8 shadow-xs">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Product Title *</label>
                    <input type="text" name="name" required value="{{ old('name', $product->name) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Category *</label>
                    <select name="category_id" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Signature Collection</label>
                    <select name="product_collection_id" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                        <option value="">None / General Collection</option>
                        @foreach($collections as $col)
                            <option value="{{ $col->id }}" {{ $product->product_collection_id == $col->id ? 'selected' : '' }}>{{ $col->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">SKU (Unique Code) *</label>
                    <input type="text" name="sku" required value="{{ old('sku', $product->sku) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Inventory Stock Quantity *</label>
                    <input type="number" name="stock_quantity" required value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Selling Price (₹) *</label>
                    <input type="number" step="0.01" name="price" required value="{{ old('price', $product->price) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Compare At / Original MRP (₹)</label>
                    <input type="number" step="0.01" name="compare_at_price" value="{{ old('compare_at_price', $product->compare_at_price) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Primary Image Path *</label>
                    <input type="text" name="primary_image" required value="{{ old('primary_image', $product->primary_image) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Craft Technique</label>
                    <input type="text" name="craft_technique" value="{{ old('craft_technique', $product->craft_technique) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Material Composition</label>
                    <input type="text" name="material" value="{{ old('material', $product->material) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Dimensions & Sizing Info</label>
                    <input type="text" name="dimensions_info" value="{{ old('dimensions_info', $product->dimensions_info) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Wash Care Instructions</label>
                    <input type="text" name="wash_care" value="{{ old('wash_care', $product->wash_care) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Short Tagline / Summary</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $product->short_description) }}" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Full Detailed Story & Description *</label>
                    <textarea name="description" rows="4" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Product Display Flags -->
                <div class="sm:col-span-2 flex flex-wrap gap-6 pt-2 border-t border-stone-200">
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }} class="rounded text-amber-700">
                        <span>Featured on Homepage</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_new_arrival" value="1" {{ $product->is_new_arrival ? 'checked' : '' }} class="rounded text-amber-700">
                        <span>New Drop Arrival</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-stone-700 cursor-pointer">
                        <input type="checkbox" name="is_bestseller" value="1" {{ $product->is_bestseller ? 'checked' : '' }} class="rounded text-amber-700">
                        <span>Bestseller Badge</span>
                    </label>
                </div>
            </div>

            <div class="pt-4 border-t border-stone-200 flex gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 border border-stone-300 text-stone-700 rounded-lg text-xs font-semibold uppercase tracking-wider">Cancel</a>
                <button type="submit" class="px-7 py-2.5 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>

