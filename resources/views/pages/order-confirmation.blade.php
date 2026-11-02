<x-layouts.app title="Order Confirmed | Raatrani">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Success Header Card -->
        <div class="bg-white rounded-2xl border border-stone-200 p-8 sm:p-10 text-center shadow-xs mb-8">
            <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4 text-emerald-700">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span class="text-xs font-bold uppercase tracking-[0.22em] text-amber-800">Order Successfully Placed</span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900 mt-1 mb-2">Thank You, {{ $order->customer_name }}!</h1>
            <p class="text-xs sm:text-sm text-stone-600 max-w-lg mx-auto leading-relaxed">
                Your order is confirmed and will be handcrafted & packed with love in Jaipur. A confirmation email and tracking link have been dispatched.
            </p>

            <!-- Order Reference Pill -->
            <div class="mt-6 inline-flex flex-wrap items-center justify-center gap-3 px-6 py-3 bg-amber-50 rounded-xl border border-amber-200 text-xs">
                <span>Order Reference: <strong class="text-amber-950 font-mono text-sm">{{ $order->order_number }}</strong></span>
                <span class="text-amber-300">|</span>
                <span>Payment: <strong class="capitalize text-stone-800">{{ str_replace('_', ' / ', $order->payment_method) }}</strong></span>
                <span class="text-amber-300">|</span>
                <span>Estimated Delivery: <strong class="text-stone-800">{{ now()->addDays(4)->format('M d') }} - {{ now()->addDays(6)->format('M d, Y') }}</strong></span>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                <button type="button" onclick="window.print()" class="px-5 py-2.5 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded-lg text-xs font-semibold uppercase tracking-wider transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span>Print Receipt</span>
                </button>
                <a href="{{ route('order.track.index') }}?order_number={{ $order->order_number }}&identifier={{ urlencode($order->customer_email) }}" class="px-5 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition">
                    Track Live Shipment
                </a>
                <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! Regarding my order #' . $order->order_number . '. Can you update me?') }}" target="_blank" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition flex items-center gap-1.5">
                    <span>WhatsApp Studio (+91 8946966292)</span>
                </a>
            </div>
        </div>

        <!-- Receipt Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Shipping Info -->
            <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-3">
                <h3 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider border-b border-stone-100 pb-2">
                    Shipping & Delivery Details
                </h3>
                <div class="text-xs text-stone-600 space-y-1">
                    <p class="font-bold text-stone-900">{{ $order->customer_name }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}</p>
                    <p>{{ $order->shipping_country }}</p>
                    <p class="pt-2 text-stone-700">Phone: <strong>{{ $order->customer_phone }}</strong></p>
                    <p class="text-stone-700">Email: <strong>{{ $order->customer_email }}</strong></p>
                    @if($order->tracking_number)
                        <p class="pt-2 text-amber-900 font-semibold">Courier Partner: {{ $order->courier_partner }} (Tracking: {{ $order->tracking_number }})</p>
                    @endif
                </div>
            </div>

            <!-- Order Cost Summary -->
            <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-3">
                <h3 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider border-b border-stone-100 pb-2">
                    Payment & Charges
                </h3>
                <div class="text-xs text-stone-600 space-y-2">
                    <div class="flex justify-between">
                        <span>Items Subtotal:</span>
                        <span class="font-semibold text-stone-900">₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    @if($order->discount_amount > 0)
                        <div class="flex justify-between text-emerald-700">
                            <span>Coupon Discount ({{ $order->coupon_code }}):</span>
                            <span>- ₹{{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span>Delivery Fee:</span>
                        <span class="font-semibold text-stone-900">
                            {{ $order->shipping_fee == 0 ? 'FREE' : '₹' . number_format($order->shipping_fee, 2) }}
                        </span>
                    </div>
                    <div class="pt-2 border-t border-stone-200 flex justify-between text-sm font-bold text-stone-900">
                        <span>Grand Total Paid / Due:</span>
                        <span class="text-amber-900 font-serif text-base">₹{{ number_format($order->grand_total, 2) }}</span>
                    </div>
                    <div class="pt-1">
                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $order->payment_status === 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-900' }}">
                            Payment Status: {{ $order->payment_status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ordered Items Table -->
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
            <h3 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3 mb-4">
                Items in This Shipment
            </h3>
            <div class="divide-y divide-stone-100">
                @foreach($order->items as $item)
                    <div class="py-3 flex items-center justify-between gap-4 text-xs">
                        <div class="flex items-center gap-3">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" alt="{{ $item->product_name }}" class="w-14 h-16 object-cover rounded-md bg-stone-100 border border-stone-200">
                            @endif
                            <div>
                                <h4 class="font-bold text-stone-900">{{ $item->product_name }}</h4>
                                @if($item->selected_option)
                                    <p class="text-stone-500">Size / Option: {{ $item->selected_option }}</p>
                                @endif
                                <p class="text-stone-600">Qty: {{ $item->quantity }} × ₹{{ number_format($item->product_price, 2) }}</p>
                            </div>
                        </div>
                        <span class="font-bold text-stone-900 text-sm">
                            ₹{{ number_format($item->subtotal, 2) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center pt-8">
            <a href="{{ route('shop.index') }}" class="inline-block px-8 py-3 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                Continue Shopping Raatrani
            </a>
        </div>
    </div>
</x-layouts.app>

