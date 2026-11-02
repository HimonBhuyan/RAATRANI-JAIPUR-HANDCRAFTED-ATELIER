<?php

namespace App\Http\Controllers;

use App\Services\WishlistService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(
        protected WishlistService $wishlistService
    ) {}

    /**
     * Show Wishlist page.
     */
    public function index(): View
    {
        $products = $this->wishlistService->getProducts();

        return view('pages.wishlist', compact('products'));
    }

    /**
     * Toggle product in wishlist.
     */
    public function toggle(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $added = $this->wishlistService->toggle((int) $validated['product_id']);
        $count = $this->wishlistService->getCount();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'added' => $added,
                'count' => $count,
                'message' => $added ? 'Added to your wishlist!' : 'Removed from your wishlist.',
            ]);
        }

        return redirect()->back()->with(
            'success',
            $added ? 'Added to wishlist!' : 'Removed from wishlist.'
        );
    }
}
