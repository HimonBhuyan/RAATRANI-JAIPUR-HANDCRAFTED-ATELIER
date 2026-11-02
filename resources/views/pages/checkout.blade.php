<x-layouts.app title="Checkout | Raatrani Handcrafted">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <nav class="flex items-center gap-2 text-xs text-stone-500 mb-2">
                <a href="{{ route('cart.index') }}" class="hover:text-stone-900 transition">Shopping Bag</a>
                <span>/</span>
                <span class="text-stone-900 font-medium">Checkout</span>
            </nav>
            <h1 class="font-serif text-2xl sm:text-3xl font-bold text-stone-900">Secure Checkout</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left Details Column (7 cols) -->
                <div class="lg:col-span-7 space-y-8">
                    
                    <!-- 1. Contact Information -->
                    <div class="bg-white rounded-xl border border-stone-200 p-4 sm:p-6 space-y-4">
                        <div class="flex items-center justify-between border-b border-stone-100 pb-3">
                            <h3 class="font-serif text-base font-bold text-stone-900">1. Contact Information</h3>
                            @guest
                                <a href="{{ route('login') }}" class="text-xs text-amber-800 hover:underline">Already have an account? Log in</a>
                            @endguest
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Full Name *</label>
                                <input 
                                    type="text" 
                                    name="customer_name" 
                                    required 
                                    value="{{ old('customer_name', $user?->name) }}" 
                                    placeholder="e.g. Ananya Sharma" 
                                    class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                >
                                @error('customer_name') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Phone Number (WhatsApp) *</label>
                                <input 
                                    type="tel" 
                                    name="customer_phone" 
                                    required 
                                    value="{{ old('customer_phone', $user?->phone) }}" 
                                    placeholder="+91 9876543210" 
                                    class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                >
                                @error('customer_phone') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Email Address *</label>
                                <input 
                                    type="email" 
                                    name="customer_email" 
                                    required 
                                    value="{{ old('customer_email', $user?->email) }}" 
                                    placeholder="ananya@example.com" 
                                    class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                >
                                @error('customer_email') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- 2. Shipping Address -->
                    <div class="bg-white rounded-xl border border-stone-200 p-4 sm:p-6 space-y-4">
                        <h3 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3">2. Delivery Address</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Street Address, Flat / House No. *</label>
                                <textarea 
                                    name="shipping_address" 
                                    rows="2" 
                                    required 
                                    placeholder="Flat 402, Magnolia Apartments, 12th Main Road..." 
                                    class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                >{{ old('shipping_address', $user?->address) }}</textarea>
                                @error('shipping_address') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">City *</label>
                                    <input 
                                        type="text" 
                                        name="shipping_city" 
                                        required 
                                        value="{{ old('shipping_city', $user?->city) }}" 
                                        placeholder="Jaipur / Mumbai" 
                                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                    >
                                    @error('shipping_city') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">State *</label>
                                    <input 
                                        type="text" 
                                        name="shipping_state" 
                                        required 
                                        value="{{ old('shipping_state', $user?->state ?? 'Rajasthan') }}" 
                                        placeholder="Rajasthan" 
                                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                    >
                                    @error('shipping_state') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">PIN Code *</label>
                                    <input 
                                        type="text" 
                                        name="shipping_pincode" 
                                        required 
                                        value="{{ old('shipping_pincode', $user?->pincode) }}" 
                                        placeholder="302002" 
                                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                    >
                                    @error('shipping_pincode') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Special Order / Gift Notes (Optional)</label>
                                <input 
                                    type="text" 
                                    name="notes" 
                                    value="{{ old('notes') }}" 
                                    placeholder="e.g. Please leave at door, or include a handwritten gift note..." 
                                    class="w-full text-xs px-3.5 py-2 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- 3. Payment Method -->
                    <div class="bg-white rounded-xl border border-stone-200 p-4 sm:p-6 space-y-4">
                        <h3 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3">3. Payment Option</h3>

                        <div class="space-y-3">
                            <!-- COD -->
                            <label class="flex items-start gap-3 p-3.5 border rounded-xl cursor-pointer hover:bg-stone-50 transition border-stone-300 has-checked:border-amber-700 has-checked:bg-amber-50/40">
                                <input type="radio" name="payment_method" value="cod" class="mt-1 text-amber-700 focus:ring-amber-700" checked>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-stone-900">Cash on Delivery (COD)</span>
                                        <span class="text-[10px] bg-stone-200 text-stone-800 px-2 py-0.5 rounded font-semibold">Available</span>
                                    </div>
                                    <p class="text-[11px] text-stone-500 mt-0.5">Pay in cash or through UPI upon package delivery at your doorstep.</p>
                                </div>
                            </label>

                            <!-- Online UPI / Cards -->
                            <label class="flex items-start gap-3 p-3.5 border rounded-xl cursor-pointer hover:bg-stone-50 transition border-stone-300 has-checked:border-amber-700 has-checked:bg-amber-50/40">
                                <input type="radio" name="payment_method" value="upi_card" class="mt-1 text-amber-700 focus:ring-amber-700">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-stone-900">UPI / QR, Cards & NetBanking</span>
                                        <span class="text-[10px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded font-semibold">Instant</span>
                                    </div>
                                    <p class="text-[11px] text-stone-500 mt-0.5">Google Pay, PhonePe, Paytm, BHIM, RuPay, Visa, Mastercard.</p>
                                </div>
                            </label>

                            <!-- WhatsApp Confirmation -->
                            <label class="flex items-start gap-3 p-3.5 border rounded-xl cursor-pointer hover:bg-stone-50 transition border-stone-300 has-checked:border-amber-700 has-checked:bg-amber-50/40">
                                <input type="radio" name="payment_method" value="whatsapp" class="mt-1 text-amber-700 focus:ring-amber-700">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-stone-900">WhatsApp Assisted Order</span>
                                        <span class="text-[10px] bg-emerald-700 text-white px-2 py-0.5 rounded font-semibold">Concierge</span>
                                    </div>
                                    <p class="text-[11px] text-stone-500 mt-0.5">Our studio confirms order via WhatsApp and shares UPI payment QR directly.</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Order Summary Column (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white rounded-xl border border-stone-200 p-4 sm:p-6 shadow-xs sticky top-28 space-y-5">
                        <h3 class="font-serif text-lg font-bold text-stone-900 border-b border-stone-100 pb-3">
                            Order Review ({{ count($items) }} {{ count($items) === 1 ? 'item' : 'items' }})
                        </h3>

                        <!-- Items Scroll -->
                        <div class="divide-y divide-stone-100 max-h-72 overflow-y-auto pr-1 space-y-3">
                            @foreach($items as $item)
                                <div class="flex gap-3 pt-3 first:pt-0 items-center">
                                    <div class="relative w-16 h-20 bg-stone-100 rounded-lg overflow-hidden shrink-0 border border-stone-200">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                        <span class="absolute top-1 right-1 bg-stone-900 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                                            {{ $item['quantity'] }}
                                        </span>
                                    </div>
                                    <div class="flex-1 text-xs">
                                        <h4 class="font-bold text-stone-900 line-clamp-2">{{ $item['name'] }}</h4>
                                        @if(!empty($item['option']))
                                            <p class="text-stone-500 text-[11px]">Size: {{ $item['option'] }}</p>
                                        @endif
                                        <p class="font-semibold text-stone-800 mt-1">₹{{ number_format($item['price'], 2) }} × {{ $item['quantity'] }}</p>
                                    </div>
                                    <div class="text-xs font-bold text-stone-900 text-right">
                                        ₹{{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Calculations -->
                        <div class="space-y-2 text-xs text-stone-600 pt-3 border-t border-stone-100">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-semibold text-stone-900">₹{{ number_format($subtotal, 2) }}</span>
                            </div>

                            @if($discount > 0)
                                <div class="flex justify-between text-emerald-700 font-medium">
                                    <span>Discount Voucher</span>
                                    <span>- ₹{{ number_format($discount, 2) }}</span>
                                </div>
                            @endif

                            <div class="flex justify-between">
                                <span>Shipping Fee</span>
                                <span class="font-semibold text-stone-900">
                                    @if($shipping == 0)
                                        <span class="text-emerald-700 font-bold uppercase">FREE</span>
                                    @else
                                        ₹{{ number_format($shipping, 2) }}
                                    @endif
                                </span>
                            </div>

                            <div class="pt-3 border-t border-stone-200 flex justify-between text-base font-bold text-stone-900">
                                <span>Amount Payable</span>
                                <span class="text-amber-900 font-serif text-xl">₹{{ number_format($grandTotal, 2) }}</span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full py-4 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-lg flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <span>Place Order • ₹{{ number_format($grandTotal, 2) }}</span>
                        </button>

                        <div class="pt-2 text-center space-y-1">
                            <p class="text-[11px] text-stone-400">🛡️ 256-bit SSL encrypted & safe transmission</p>
                            <p class="text-[11px] text-stone-400">Direct courier tracking link sent via SMS/WhatsApp</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>

