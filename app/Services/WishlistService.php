<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class WishlistService
{
    private const SESSION_KEY = 'raatrani_wishlist';

    /**
     * Get all wishlist product IDs.
     *
     * @return list<int>
     */
    public function getWishlistIds(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Toggle product in wishlist.
     *
     * @return bool True if added, false if removed
     */
    public function toggle(int $productId): bool
    {
        $wishlist = $this->getWishlistIds();

        if (in_array($productId, $wishlist, true)) {
            $wishlist = array_values(array_diff($wishlist, [$productId]));
            $added = false;
        } else {
            $wishlist[] = $productId;
            $added = true;
        }

        Session::put(self::SESSION_KEY, $wishlist);

        return $added;
    }

    /**
     * Check if a product is in wishlist.
     */
    public function has(int $productId): bool
    {
        return in_array($productId, $this->getWishlistIds(), true);
    }

    /**
     * Get Eloquent collection of wishlisted products.
     */
    public function getProducts(): Collection
    {
        $ids = $this->getWishlistIds();
        if (empty($ids)) {
            return new Collection;
        }

        return Product::whereIn('id', $ids)->get();
    }

    /**
     * Total number of wishlisted items.
     */
    public function getCount(): int
    {
        return count($this->getWishlistIds());
    }
}
