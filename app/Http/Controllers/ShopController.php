<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a paginated listing of products with filters.
     */
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'productCollection']);

        // Search query
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('craft_technique', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Category filter with alias mapping for all 13 handcrafted product lines
        if ($request->filled('category')) {
            $catSlug = $request->input('category');
            $aliasMap = [
                'clothing-robes' => ['clothing-robes', 'bathrobes'],
                'bathrobes' => ['bathrobes', 'clothing-robes'],
                'bedsheets-linen' => ['bedsheets-linen', 'bedsheets'],
                'bedsheets' => ['bedsheets', 'bedsheets-linen'],
                'dohars-quilts' => ['dohars-quilts', 'dohars', 'comforters'],
                'dohars' => ['dohars', 'dohars-quilts'],
                'comforters' => ['comforters', 'dohars-quilts'],
                'cushions-throws' => ['cushions-throws', 'cushion-covers', 'sofa-throws'],
                'cushion-covers' => ['cushion-covers', 'cushions-throws'],
                'sofa-throws' => ['sofa-throws', 'cushions-throws'],
                'dining-table-linen' => ['dining-table-linen', 'table-linen', 'table-runners'],
                'table-linen' => ['table-linen', 'dining-table-linen'],
                'table-runners' => ['table-runners', 'dining-table-linen'],
                'bags-accessories' => ['bags-accessories', 'bags', 'yoga-bags', 'handbags'],
                'bags' => ['bags', 'bags-accessories'],
                'yoga-bags' => ['yoga-bags', 'bags-accessories'],
                'handbags' => ['handbags', 'bags-accessories'],
                'bath-towels' => ['bath-towels', 'towels'],
                'towels' => ['towels', 'bath-towels'],
                'rugs-dhurries' => ['rugs-dhurries', 'rugs'],
                'rugs' => ['rugs', 'rugs-dhurries'],
            ];

            $targetSlugs = $aliasMap[$catSlug] ?? [$catSlug];
            $query->whereHas('category', function ($q) use ($targetSlugs) {
                $q->whereIn('slug', $targetSlugs);
            });
        }

        // Collection filter
        if ($request->filled('collection')) {
            $colSlug = $request->input('collection');
            $query->whereHas('productCollection', function ($q) use ($colSlug) {
                $q->where('slug', $colSlug);
            });
        }

        // Craft technique filter
        if ($request->filled('craft')) {
            $query->where('craft_technique', 'like', '%'.$request->input('craft').'%');
        }

        // Price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->input('max_price'));
        }

        // Sorting
        $sort = $request->input('sort', 'featured');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'newest' => $query->latest(),
            'rating' => $query->orderBy('rating', 'desc'),
            'bestselling' => $query->orderBy('is_bestseller', 'desc')->orderBy('review_count', 'desc'),
            default => $query->orderBy('is_featured', 'desc')->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        $allCategories = Category::withCount('products')->orderBy('name')->get();
        $allCollections = ProductCollection::withCount('products')->where('is_active', true)->get();

        $currentCategory = $request->filled('category')
            ? Category::where('slug', $request->input('category'))->first()
            : null;

        $currentCollection = $request->filled('collection')
            ? ProductCollection::where('slug', $request->input('collection'))->first()
            : null;

        return view('pages.shop', compact(
            'products',
            'allCategories',
            'allCollections',
            'currentCategory',
            'currentCollection'
        ));
    }

    /**
     * Display a specific product details page.
     */
    public function show(string $slug): View
    {
        $product = Product::with(['category', 'productCollection', 'reviews'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * View products by Category.
     */
    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        request()->merge(['category' => $slug]);

        return $this->index(request());
    }

    /**
     * View products by Collection.
     */
    public function collection(string $slug): View
    {
        $collection = ProductCollection::where('slug', $slug)->firstOrFail();
        request()->merge(['collection' => $slug]);

        return $this->index(request());
    }
}
