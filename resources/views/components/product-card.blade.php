@props(['product'])

@php
    $wishlistService = app(\App\Services\WishlistService::class);
    $inWishlist = $wishlistService->has($product->id);
    $discount = $product->discountPercentage();
    $firstOption = is_array($product->options) && count($product->options) > 0 ? $product->options[0] : null;
    $waText = "Hello Raatrani! I would like to order: " . $product->name . " (SKU: " . $product->sku . ", Price: ₹" . number_format($product->price, 2) . "). Please confirm availability.";
@endphp

<div class="group relative flex flex-col bg-white rounded-2xl border border-[#ede6dc] overflow-hidden shadow-2xs hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
    <!-- Image & Badges Container -->
    <div class="relative aspect-3/4 w-full bg-[#f8f5ef] overflow-hidden">
        <a href="{{ route('shop.product', $product->slug) }}" class="block w-full h-full">
            <img 
                src="{{ asset($product->primary_image) }}" 
                alt="{{ $product->name }}" 
                class="w-full h-full object-cover object-center group-hover:scale-108 transition-transform duration-700 ease-out"
                loading="lazy"
            >
        </a>

        <!-- Subtle Top Badges -->
        <div class="absolute top-2 left-2 sm:top-3 sm:left-3 flex flex-col gap-1 sm:gap-1.5 items-start z-10 pointer-events-none">
            @if($discount > 0)
                <span class="px-2 sm:px-2.5 py-0.5 sm:py-1 text-[8px] sm:text-[9px] font-semibold tracking-[0.14em] uppercase bg-stone-900/90 text-amber-200 rounded-full backdrop-blur-xs shadow-xs border border-amber-900/40">
                    {{ $discount }}% OFF
                </span>
            @endif
            @if($product->is_new_arrival)
                <span class="px-2 sm:px-2.5 py-0.5 sm:py-1 text-[8px] sm:text-[9px] font-semibold tracking-[0.14em] uppercase bg-[#FAF7F2]/95 text-stone-800 rounded-full backdrop-blur-xs shadow-xs border border-[#ede6dc]">
                    NEW
                </span>
            @elseif($product->is_bestseller)
                <span class="px-2 sm:px-2.5 py-0.5 sm:py-1 text-[8px] sm:text-[9px] font-semibold tracking-[0.14em] uppercase bg-[#8b3a3a] text-white rounded-full backdrop-blur-xs shadow-xs">
                    BESTSELLER
                </span>
            @endif
        </div>

        <!-- Wishlist Toggle Button -->
        <button 
            type="button" 
            onclick="toggleWishlist({{ $product->id }}, this)" 
            class="absolute top-2 right-2 sm:top-3 sm:right-3 w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-rose-600 shadow-sm backdrop-blur-xs transition-all duration-300 flex items-center justify-center z-10 cursor-pointer border border-[#ede6dc]"
            title="{{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}"
        >
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 {{ $inWishlist ? 'fill-rose-600 text-rose-600' : 'fill-none text-stone-700' }}" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>

        <!-- Slide-Up Quick Actions Drawer (reveals on desktop hover) -->
        <div class="absolute inset-x-3 bottom-3 z-10 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 hidden sm:flex flex-col gap-1.5">
            <button 
                type="button" 
                onclick="quickAddToCart({{ $product->id }}, '{{ addslashes($firstOption) }}')"
                class="w-full py-2.5 bg-[#1c1917]/95 hover:bg-[#1c1917] text-[#FAF7F2] backdrop-blur-xs rounded-xl text-[11px] font-medium tracking-[0.14em] uppercase shadow-md transition flex items-center justify-center gap-2 cursor-pointer border border-amber-900/30"
            >
                <svg class="w-3.5 h-3.5 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Add to Bag</span>
            </button>
        </div>
    </div>

    <!-- Product Info Details -->
    <div class="p-3 sm:p-5 flex flex-col flex-1 justify-between bg-white">
        <div>
            <!-- Category & Technique Subtitle -->
            <div class="flex items-center justify-between text-[9px] sm:text-[10px] tracking-[0.14em] sm:tracking-[0.16em] uppercase text-[#8c7b6c] mb-1 font-medium">
                <span class="truncate max-w-[90px] sm:max-w-none">{{ $product->category?->name ?? 'Handcrafted' }}</span>
                @if($product->craft_technique)
                    <span class="text-stone-400 truncate max-w-[80px] sm:max-w-[110px] font-normal hidden xs:inline">{{ explode('&', $product->craft_technique)[0] }}</span>
                @endif
            </div>

            <!-- Product Title -->
            <h3 class="font-serif text-stone-900 font-normal text-xs sm:text-base leading-snug line-clamp-2 hover:text-[#8b3a3a] transition-colors">
                <a href="{{ route('shop.product', $product->slug) }}">
                    {{ $product->name }}
                </a>
            </h3>

            <!-- Rating Stars with Subtle Count -->
            <div class="flex items-center gap-1 mt-1 sm:mt-2 text-xs">
                <div class="flex text-amber-600">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 {{ $i <= floor($product->rating) ? 'fill-amber-500' : 'fill-stone-200' }}" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <span class="text-[10px] sm:text-[11px] text-stone-400 font-light">({{ $product->review_count ?: 8 }})</span>
            </div>
        </div>

        <!-- Pricing & WhatsApp Action -->
        <div class="mt-2.5 sm:mt-3 pt-2.5 sm:pt-3 border-t border-[#ede6dc]/70 flex items-center justify-between">
            <div class="flex items-baseline gap-1.5 sm:gap-2">
                <span class="font-serif text-stone-900 font-medium text-sm sm:text-base">₹{{ number_format($product->price, 2) }}</span>
                @if($product->compare_at_price && $product->compare_at_price > $product->price)
                    <span class="text-[11px] sm:text-xs text-stone-400 line-through font-light hidden sm:inline">₹{{ number_format($product->compare_at_price, 2) }}</span>
                @endif
            </div>

            <!-- WhatsApp Direct Concierge Link -->
            <a 
                href="https://wa.me/918946966292?text={{ urlencode($waText) }}" 
                target="_blank" 
                title="Instant WhatsApp Concierge Order"
                class="p-1.5 sm:p-2 text-emerald-800 bg-emerald-50 hover:bg-emerald-100 rounded-full border border-emerald-200/80 transition-all duration-200 shrink-0 hover:scale-105"
            >
                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 fill-emerald-700" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.585 1.776.84 2.802.84 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.774-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
