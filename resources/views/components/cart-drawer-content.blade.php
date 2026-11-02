@php
    $freeShippingThreshold = \App\Services\CartService::FREE_SHIPPING_THRESHOLD;
@endphp

<div class="flex flex-col h-full">
    <!-- Free Shipping Progress -->
    <div class="p-4 bg-amber-50/60 border-b border-amber-100">
        @if($freeShippingRemaining > 0)
            <div class="text-xs text-amber-900 font-medium mb-1.5 flex justify-between items-center">
                <span>Add <strong class="text-amber-800">₹{{ number_format($freeShippingRemaining, 2) }}</strong> more for <strong>FREE Delivery</strong></span>
                <span>{{ $freeShippingProgress }}%</span>
            </div>
            <div class="w-full bg-amber-200/80 rounded-full h-1.5 overflow-hidden">
                <div class="bg-amber-600 h-1.5 rounded-full transition-all duration-300" style="width: {{ $freeShippingProgress }}%"></div>
            </div>
        @else
            <div class="flex items-center gap-1.5 text-xs text-emerald-800 font-medium">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Congratulations! You qualify for <strong>FREE Standard Delivery</strong></span>
            </div>
        @endif
    </div>

    <!-- Items List -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4">
        @forelse($items as $key => $item)
            <div class="flex gap-3 pb-4 border-b border-stone-200/70 text-sm">
                <a href="{{ route('shop.product', $item['slug']) }}" class="shrink-0 w-20 h-24 rounded-lg overflow-hidden bg-stone-100 border border-stone-200">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                </a>
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start gap-2">
                            <a href="{{ route('shop.product', $item['slug']) }}" class="font-medium text-stone-900 hover:text-amber-700 transition line-clamp-2">
                                {{ $item['name'] }}
                            </a>
                            <button type="button" onclick="removeFromCart('{{ $key }}')" class="text-stone-400 hover:text-rose-600 transition p-1" title="Remove item">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        @if(!empty($item['option']))
                            <p class="text-xs text-stone-500 mt-0.5">Size/Option: {{ $item['option'] }}</p>
                        @endif
                        <p class="text-xs font-semibold text-stone-800 mt-1">₹{{ number_format($item['price'], 2) }}</p>
                    </div>

                    <!-- Quantity Stepper -->
                    <div class="flex items-center justify-between mt-2 pt-1">
                        <div class="inline-flex items-center border border-stone-300 rounded-md bg-white">
                            <button type="button" onclick="updateCartQuantity('{{ $key }}', {{ $item['quantity'] - 1 }})" class="px-2 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold transition">−</button>
                            <span class="px-2.5 py-0.5 text-xs text-stone-800 font-medium">{{ $item['quantity'] }}</span>
                            <button type="button" onclick="updateCartQuantity('{{ $key }}', {{ $item['quantity'] + 1 }})" class="px-2 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold transition">+</button>
                        </div>
                        <span class="text-xs font-semibold text-stone-900">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12 px-4">
                <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-3 text-amber-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h4 class="font-serif text-lg text-stone-900 font-semibold mb-1">Your bag is empty</h4>
                <p class="text-xs text-stone-500 mb-5">Discover artisanal quilts, bathrobes & bedsheets handcrafted in Jaipur.</p>
                <a href="{{ route('shop.index') }}" onclick="closeCartDrawer()" class="inline-block px-5 py-2.5 bg-stone-900 text-white rounded-md text-xs font-medium uppercase tracking-wider hover:bg-stone-800 transition">
                    Explore Catalog
                </a>
            </div>
        @endforelse
    </div>

    <!-- Summary & Checkout Footer -->
    @if(count($items) > 0)
        <div class="p-4 bg-stone-50 border-t border-stone-200 space-y-3">
            <!-- Coupon Code info if applied -->
            @if($coupon)
                <div class="flex justify-between items-center text-xs bg-emerald-50 text-emerald-800 px-3 py-1.5 rounded border border-emerald-200">
                    <span>Coupon <strong>{{ $coupon->code }}</strong></span>
                    <span>- ₹{{ number_format($discount, 2) }}</span>
                </div>
            @endif

            <div class="space-y-1.5 text-xs text-stone-600">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span class="font-medium text-stone-900">₹{{ number_format($subtotal, 2) }}</span>
                </div>
                @if($discount > 0)
                    <div class="flex justify-between text-emerald-700">
                        <span>Discount</span>
                        <span>- ₹{{ number_format($discount, 2) }}</span>
                    </div>
                @endif
                <div class="flex justify-between">
                    <span>Estimated Shipping</span>
                    <span class="font-medium text-stone-900">
                        @if($shipping == 0)
                            <span class="text-emerald-700 font-semibold uppercase">Free</span>
                        @else
                            ₹{{ number_format($shipping, 2) }}
                        @endif
                    </span>
                </div>
                <div class="flex justify-between text-sm font-semibold text-stone-900 pt-2 border-t border-stone-200">
                    <span>Grand Total</span>
                    <span class="text-base text-amber-900">₹{{ number_format($grandTotal, 2) }}</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2 pt-1">
                <a href="{{ route('cart.index') }}" onclick="closeCartDrawer()" class="w-full py-2.5 text-center text-xs font-semibold text-stone-800 border border-stone-300 rounded-md hover:bg-stone-100 transition uppercase tracking-wider">
                    View Bag
                </a>
                <a href="{{ route('checkout.index') }}" class="w-full py-2.5 text-center text-xs font-semibold text-white bg-stone-900 rounded-md hover:bg-stone-800 transition uppercase tracking-wider shadow-sm">
                    Checkout
                </a>
            </div>

            <!-- WhatsApp Direct Order helper -->
            <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to place an order for the items in my cart totaling ₹' . number_format($grandTotal, 2)) }}" target="_blank" class="flex items-center justify-center gap-1.5 w-full py-2 text-xs font-medium text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-md transition">
                <svg class="w-4 h-4 fill-emerald-600" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.585 1.776.84 2.802.84 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.774-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
                </svg>
                <span>Order Instantly on WhatsApp</span>
            </a>
        </div>
    @endif
</div>

