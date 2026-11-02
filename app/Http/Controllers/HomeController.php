<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\Review;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with collections, featured products, and craft story.
     */
    public function index(): View
    {
        $featuredProducts = Product::with('category')
            ->featured()
            ->take(8)
            ->get();

        $newArrivals = Product::with('category')
            ->newArrivals()
            ->take(8)
            ->get();

        $bestsellers = Product::with('category')
            ->bestsellers()
            ->take(8)
            ->get();

        $collections = ProductCollection::where('is_active', true)
            ->withCount('products')
            ->take(4)
            ->get();

        $categories = Category::where('is_featured', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        $reviews = Review::with('product')
            ->where('is_approved', true)
            ->where('rating', '>=', 4)
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact(
            'featuredProducts',
            'newArrivals',
            'bestsellers',
            'collections',
            'categories',
            'reviews'
        ));
    }
}
