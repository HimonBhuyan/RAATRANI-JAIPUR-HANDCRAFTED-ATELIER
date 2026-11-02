<?php

use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminInquiryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderTrackingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Public Storefront Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop & Catalog
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('shop.product');
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/collections/{slug}', [ShopController::class, 'collection'])->name('shop.collection');

// Cart & Cart Drawer
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::match(['delete', 'post'], '/cart/remove/{cartKey}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon/apply', [CartController::class, 'applyCoupon'])->name('cart.coupon.apply');
Route::post('/cart/coupon/remove', [CartController::class, 'removeCoupon'])->name('cart.coupon.remove');
Route::get('/cart/drawer', [CartController::class, 'drawer'])->name('cart.drawer');

// Checkout & Confirmation
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order-confirmation/{order_number}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');

// Order Tracking
Route::get('/track-order', [OrderTrackingController::class, 'index'])->name('order.track.index');
Route::post('/track-order', [OrderTrackingController::class, 'track'])->name('order.track.search');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

// Product Reviews
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

// Brand Story, Craft & Info Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/the-craft', [PageController::class, 'craft'])->name('craft');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/gifting', [PageController::class, 'gifting'])->name('gifting');

// Customer Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Customer Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/account', [AuthController::class, 'account'])->name('account.dashboard');
    Route::post('/account/profile', [AuthController::class, 'updateProfile'])->name('account.profile.update');
});

// Admin Management Portal
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Products CRUD
    Route::resource('products', AdminProductController::class)->except(['show']);

    // Orders Management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.status');

    // Coupons
    Route::get('/coupons', [AdminCouponController::class, 'index'])->name('coupons.index');
    Route::post('/coupons', [AdminCouponController::class, 'store'])->name('coupons.store');
    Route::post('/coupons/{coupon}/toggle', [AdminCouponController::class, 'toggle'])->name('coupons.toggle');
    Route::delete('/coupons/{coupon}', [AdminCouponController::class, 'destroy'])->name('coupons.destroy');

    // Inquiries
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::post('/inquiries/{inquiry}/toggle', [AdminInquiryController::class, 'toggleRead'])->name('inquiries.toggle');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');
});
