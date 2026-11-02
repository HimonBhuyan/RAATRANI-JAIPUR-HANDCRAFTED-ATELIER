<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\CartService;
use App\Services\WishlistService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CartService::class);
        $this->app->singleton(WishlistService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartService = app(CartService::class);
            $wishlistService = app(WishlistService::class);

            $navCategories = [];
            if (Schema::hasTable('categories')) {
                $navCategories = Category::orderBy('sort_order')->get();
            }

            $view->with([
                'cartItemCount' => $cartService->getItemCount(),
                'cartSubtotal' => $cartService->getSubtotal(),
                'wishlistCount' => $wishlistService->getCount(),
                'navCategories' => $navCategories,
            ]);
        });
    }
}
