<x-layouts.app title="Your Shopping Bag | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900">Your Shopping Bag</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-1">Review your handcrafted selections before secure checkout.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @if(count($items) > 0)
            <!-- Free Shipping Progress -->
            <div class="p-4 bg-amber-50 rounded-xl border border-amber-200 mb-8">
                @if($freeShippingRemaining > 0)
                    <div class="flex justify-between items-center text-xs text-amber-900 font-semibold mb-2">
                        <span>Add <strong class="text-amber-800">₹{{ number_format($freeShippingRemaining, 2) }}</strong> more to unlock <strong>FREE Express Delivery</strong></span>
                        <span>{{ $freeShippingProgress }}%</span>
                    </div>
                    <div class="w-full bg-amber-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-amber-600 h-2 rounded-full transition-all duration-300" style="width: {{ $freeShippingProgress }}%"></div>
                    </div>
                @else
                    <div class="flex items-center gap-2 text-xs font-semibold text-emerald-800">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Congratulations! Your order qualifies for <strong>FREE Pan-India Delivery</strong></span>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Items Table (8 cols) -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-xs">
                        <div class="hidden sm:grid grid-cols-12 gap-4 p-4 bg-stone-50 border-b border-stone-200 text-xs font-bold uppercase tracking-wider text-stone-500">
                            <div class="col-span-6">Product</div>
                            <div class="col-span-2 text-center">Price</div>
                            <div class="col-span-2 text-center">Quantity</div>
                            <div class="col-span-2 text-right">Total</div>
                        </div>

                        <div class="divide-y divide-stone-100">
                            @foreach($items as $key => $item)
                                <div class="p-4 sm:p-5 flex flex-col sm:grid sm:grid-cols-12 gap-4 items-center">
                                    <!-- Item Info (6 cols) -->
                                    <div class="w-full sm:col-span-6 flex gap-4 items-center">
                                        <a href="{{ route('shop.product', $item['slug']) }}" class="w-20 h-24 rounded-lg overflow-hidden bg-stone-100 shrink-0 border border-stone-200">
                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                        </a>
                                        <div class="space-y-1">
                                            <a href="{{ route('shop.product', $item['slug']) }}" class="font-serif font-bold text-sm text-stone-900 hover:text-amber-800 transition line-clamp-2">
                                                {{ $item['name'] }}
                                            </a>
                                            @if(!empty($item['option']))
                                                <p class="text-xs text-stone-500">Size/Option: <strong class="text-stone-700">{{ $item['option'] }}</strong></p>
                                            @endif
                                            <form action="{{ route('cart.remove', $key) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs text-rose-600 hover:text-rose-800 underline cursor-pointer">
                                                    Remove item
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Unit Price (2 cols) -->
                                    <div class="hidden sm:block sm:col-span-2 text-center text-xs font-semibold text-stone-800">
                                        ₹{{ number_format($item['price'], 2) }}
                                    </div>

                                    <!-- Quantity Stepper (2 cols) -->
                                    <div class="w-full sm:w-auto sm:col-span-2 flex justify-between sm:justify-center items-center">
                                        <span class="sm:hidden text-xs text-stone-500">Quantity:</span>
                                        <div class="inline-flex items-center border border-stone-300 rounded-md bg-white">
                                            <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="cart_key" value="{{ $key }}">
                                                <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                                <button type="submit" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 font-bold text-xs">−</button>
                                            </form>
                                            <span class="px-3 py-1 text-xs font-bold text-stone-900">{{ $item['quantity'] }}</span>
                                            <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="cart_key" value="{{ $key }}">
                                                <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                                <button type="submit" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 font-bold text-xs">+</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Subtotal (2 cols) -->
                                    <div class="w-full sm:w-auto sm:col-span-2 flex justify-between sm:justify-end items-center text-sm font-bold text-stone-900">
                                        <span class="sm:hidden text-xs text-stone-500 font-normal">Subtotal:</span>
                                        <span>₹{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-2">
                        <a href="{{ route('shop.index') }}" class="text-xs font-semibold text-stone-700 hover:text-amber-800 uppercase tracking-wider flex items-center gap-1.5">
                            <span>←</span> Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Order Summary & Checkout (4 cols) -->
                <div class="lg:col-span-4 space-y-6">
                    <!-- Coupon Voucher Box -->
                    <div class="bg-white rounded-xl border border-stone-200 p-5 space-y-3">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider">Promotional Code</h4>
                        
                        @if($coupon)
                            <div class="flex justify-between items-center p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-xs">
                                <div>
                                    <span class="font-bold text-emerald-900">{{ $coupon->code }}</span>
                                    <span class="text-emerald-700 block text-[11px]">Voucher Applied!</span>
                                </div>
                                <form action="{{ route('cart.coupon.remove') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-rose-600 hover:underline">Remove</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('cart.coupon.apply') }}" method="POST" class="flex gap-2">
                                @csrf
                                <input 
                                    type="text" 
                                    name="code" 
                                    required 
                                    placeholder="Enter Coupon (e.g. RAATRANI10)" 
                                    class="flex-1 text-xs px-3 py-2.5 bg-stone-50 border border-stone-300 rounded-lg uppercase tracking-wider focus:outline-none focus:border-amber-600"
                                >
                                <button type="submit" class="px-4 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                                    Apply
                                </button>
                            </form>
                            <p class="text-[11px] text-stone-400">Available: Use <strong class="text-stone-700 font-mono">RAATRANI10</strong> for 10% discount.</p>
                        @endif
                    </div>

                    <!-- Summary Box -->
                    <div class="bg-white rounded-xl border border-stone-200 p-5 space-y-4 shadow-xs">
                        <h4 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3">Order Summary</h4>
                        
                        <div class="space-y-2 text-xs text-stone-600">
                            <div class="flex justify-between">
                                <span>Bag Subtotal</span>
                                <span class="font-semibold text-stone-900">₹{{ number_format($subtotal, 2) }}</span>
                            </div>

                            @if($discount > 0)
                                <div class="flex justify-between text-emerald-700 font-medium">
                                    <span>Discount ({{ $coupon->code }})</span>
                                    <span>- ₹{{ number_format($discount, 2) }}</span>
                                </div>
                            @endif

                            <div class="flex justify-between">
                                <span>Shipping Charges</span>
                                <span class="font-semibold text-stone-900">
                                    @if($shipping == 0)
                                        <span class="text-emerald-700 uppercase font-bold">FREE</span>
                                    @else
                                        ₹{{ number_format($shipping, 2) }}
                                    @endif
                                </span>
                            </div>

                            <div class="pt-3 border-t border-stone-200 flex justify-between text-base font-bold text-stone-900">
                                <span>Grand Total</span>
                                <span class="text-amber-900">₹{{ number_format($grandTotal, 2) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="block w-full py-3.5 bg-amber-700 hover:bg-amber-600 text-white text-center rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-md">
                            Proceed to Checkout
                        </a>

                        <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to order the items in my shopping bag. Total: ₹' . number_format($grandTotal, 2)) }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-lg text-xs font-semibold transition">
                            <span>Order Directly on WhatsApp</span>
                        </a>

                        <div class="pt-2 text-center text-[11px] text-stone-400">
                            🔒 100% Encrypted & Safe Checkout • Cash on Delivery Available
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Bag State -->
            <div class="text-center py-20 bg-white rounded-2xl border border-stone-200 p-8 max-w-xl mx-auto">
                <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-4 text-amber-800">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-bold text-stone-900 mb-2">Your Shopping Bag is Empty</h3>
                <p class="text-xs sm:text-sm text-stone-500 mb-8 leading-relaxed">
                    Explore our curated collections of pure cotton waffle bathrobes, hand block printed bedsheets, diwan sets, and quilted totes.
                </p>
                <a href="{{ route('shop.index') }}" class="inline-block px-8 py-3.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-md">
                    Explore Collection
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>

