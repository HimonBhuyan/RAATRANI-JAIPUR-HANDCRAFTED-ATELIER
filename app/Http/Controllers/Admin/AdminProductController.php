<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display all products in admin.
     */
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'productCollection'])->latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where('name', 'like', "%{$s}%")->orWhere('sku', 'like', "%{$s}%");
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show create product form.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        $collections = ProductCollection::where('is_active', true)->get();

        return view('admin.products.create', compact('categories', 'collections'));
    }

    /**
     * Store new product.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'product_collection_id' => ['nullable', 'exists:product_collections,id'],
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:50', 'unique:products'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'craft_technique' => ['nullable', 'string', 'max:150'],
            'material' => ['nullable', 'string', 'max:150'],
            'dimensions_info' => ['nullable', 'string', 'max:200'],
            'wash_care' => ['nullable', 'string', 'max:200'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'primary_image' => ['required', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'is_new_arrival' => ['nullable', 'boolean'],
            'is_bestseller' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']).'-'.Str::lower(Str::random(4));
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('name')->get();
        $collections = ProductCollection::where('is_active', true)->get();

        return view('admin.products.edit', compact('product', 'categories', 'collections'));
    }

    /**
     * Update product.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'product_collection_id' => ['nullable', 'exists:product_collections,id'],
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:50', 'unique:products,sku,'.$product->id],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'craft_technique' => ['nullable', 'string', 'max:150'],
            'material' => ['nullable', 'string', 'max:150'],
            'dimensions_info' => ['nullable', 'string', 'max:200'],
            'wash_care' => ['nullable', 'string', 'max:200'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'primary_image' => ['required', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'is_new_arrival' => ['nullable', 'boolean'],
            'is_bestseller' => ['nullable', 'boolean'],
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Delete product.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
