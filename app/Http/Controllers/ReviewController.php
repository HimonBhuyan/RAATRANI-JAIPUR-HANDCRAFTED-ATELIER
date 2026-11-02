<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Submit a product review.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_city' => ['nullable', 'string', 'max:100'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        $review = Review::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::id(),
            'customer_name' => $validated['customer_name'],
            'customer_city' => $validated['customer_city'] ?? 'India',
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        // Update product average rating and review count
        $product = Product::find($validated['product_id']);
        if ($product) {
            $avg = Review::where('product_id', $product->id)->where('is_approved', true)->avg('rating');
            $count = Review::where('product_id', $product->id)->where('is_approved', true)->count();
            $product->update([
                'rating' => round($avg, 2),
                'review_count' => $count,
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for your review! It has been published.');
    }
}
