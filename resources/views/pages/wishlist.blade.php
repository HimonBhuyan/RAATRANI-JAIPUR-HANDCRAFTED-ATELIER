<x-layouts.app title="My Wishlist | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="font-serif text-3xl font-bold text-stone-900">Saved Wishlist</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-1">Your curated favorites, ready to bring warmth into your space.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @if($products->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($products as $product)
                    <div class="relative">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-stone-200 p-8 max-w-md mx-auto">
                <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 fill-none stroke-current" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="font-serif text-xl font-bold text-stone-900 mb-1">Your Wishlist is Empty</h3>
                <p class="text-xs text-stone-500 mb-6">Click the heart icon on any product to save your favorite block-printed pieces.</p>
                <a href="{{ route('shop.index') }}" class="inline-block px-6 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition">
                    Explore Shop
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

