<x-layouts.app title="Track Your Order | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-800">Real-Time Delivery Status</span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900 mt-1">Track Your Order</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-2 max-w-md mx-auto">
                Enter your unique Raatrani Order ID along with your email or phone number to check live courier updates.
            </p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Search Form Card -->
        <div class="bg-white rounded-2xl border border-stone-200 p-6 sm:p-8 shadow-xs mb-8">
            <form action="{{ route('order.track.search') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-end">
                @csrf
                <div class="sm:col-span-5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Order Number *
                    </label>
                    <input 
                        type="text" 
                        name="order_number" 
                        required 
                        value="{{ request('order_number') ?? old('order_number') }}" 
                        placeholder="e.g. RT-260194" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg uppercase tracking-wider focus:outline-none focus:border-amber-700"
                    >
                </div>

                <div class="sm:col-span-5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Email Address or Phone Number *
                    </label>
                    <input 
                        type="text" 
                        name="identifier" 
                        required 
                        value="{{ request('identifier') ?? old('identifier') }}" 
                        placeholder="e.g. your email or 9876543210" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                </div>

                <div class="sm:col-span-2">
                    <button type="submit" class="w-full py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                        Track
                    </button>
                </div>
            </form>
        </div>

        @if(isset($searched))
            @if($order)
                <!-- Tracking Status Card -->
                <div class="bg-white rounded-2xl border border-stone-200 p-6 sm:p-8 shadow-xs space-y-8">
                    <!-- Order Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-stone-200">
                        <div>
                            <span class="text-xs uppercase font-bold text-amber-800 tracking-wider">Shipment Details</span>
                            <h2 class="font-serif text-2xl font-bold text-stone-900 mt-0.5">Order #{{ $order->order_number }}</h2>
                            <p class="text-xs text-stone-500">Placed on {{ $order->created_at->format('M d, Y • h:i A') }}</p>
                        </div>
                        <div class="text-left sm:text-right">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider 
                                @if($order->order_status === 'delivered') bg-emerald-100 text-emerald-800 
                                @elseif($order->order_status === 'shipped') bg-amber-100 text-amber-900 
                                @else bg-stone-100 text-stone-800 @endif">
                                Status: {{ $order->order_status }}
                            </span>
                            @if($order->tracking_number)
                                <p class="text-xs text-stone-600 mt-1">
                                    Courier: <strong>{{ $order->courier_partner }}</strong> (AWB: <strong class="font-mono text-stone-900">{{ $order->tracking_number }}</strong>)
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Visual Milestone Stepper -->
                    @php
                        $statuses = ['confirmed' => 'Order Placed', 'processing' => 'Artisan Pack', 'shipped' => 'In Transit', 'delivered' => 'Delivered'];
                        $currentIdx = match($order->order_status) {
                            'pending', 'confirmed' => 1,
                            'processing' => 2,
                            'shipped' => 3,
                            'delivered' => 4,
                            default => 1,
                        };
                    @endphp
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-stone-700 mb-6">Delivery Progress</h4>
                        <div class="grid grid-cols-4 gap-2 text-center relative">
                            <!-- Progress Line -->
                            <div class="absolute top-4 left-[12%] right-[12%] h-0.5 bg-stone-200 z-0">
                                <div class="h-0.5 bg-emerald-600 transition-all duration-500" style="width: {{ (($currentIdx - 1) / 3) * 100 }}%"></div>
                            </div>

                            <!-- Step 1 -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold {{ $currentIdx >= 1 ? 'bg-emerald-600 text-white' : 'bg-stone-200 text-stone-600' }}">
                                    ✓
                                </div>
                                <span class="text-xs font-semibold text-stone-900 mt-2">Placed</span>
                                <span class="text-[10px] text-stone-400">{{ $order->created_at->format('d M') }}</span>
                            </div>

                            <!-- Step 2 -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold {{ $currentIdx >= 2 ? 'bg-emerald-600 text-white' : 'bg-stone-200 text-stone-600' }}">
                                    {{ $currentIdx >= 2 ? '✓' : '2' }}
                                </div>
                                <span class="text-xs font-semibold text-stone-900 mt-2">Quality Checked</span>
                                <span class="text-[10px] text-stone-400">Jaipur Studio</span>
                            </div>

                            <!-- Step 3 -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold {{ $currentIdx >= 3 ? 'bg-emerald-600 text-white' : 'bg-stone-200 text-stone-600' }}">
                                    {{ $currentIdx >= 3 ? '✓' : '3' }}
                                </div>
                                <span class="text-xs font-semibold text-stone-900 mt-2">In Transit</span>
                                <span class="text-[10px] text-stone-400">{{ $order->courier_partner }}</span>
                            </div>

                            <!-- Step 4 -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold {{ $currentIdx >= 4 ? 'bg-emerald-600 text-white' : 'bg-stone-200 text-stone-600' }}">
                                    {{ $currentIdx >= 4 ? '✓' : '4' }}
                                </div>
                                <span class="text-xs font-semibold text-stone-900 mt-2">Delivered</span>
                                <span class="text-[10px] text-stone-400">At Doorstep</span>
                            </div>
                        </div>
                    </div>

                    <!-- Destination and Items -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-stone-200">
                        <div class="space-y-2 text-xs text-stone-600">
                            <h4 class="font-bold uppercase tracking-wider text-stone-900">Delivery Address</h4>
                            <p class="font-bold text-stone-900">{{ $order->customer_name }}</p>
                            <p>{{ $order->shipping_address }}</p>
                            <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}</p>
                            <p>Phone: {{ $order->customer_phone }}</p>
                        </div>

                        <div class="space-y-2 text-xs">
                            <h4 class="font-bold uppercase tracking-wider text-stone-900">Ordered Items</h4>
                            <div class="space-y-2">
                                @foreach($order->items as $item)
                                    <div class="flex items-center justify-between">
                                        <span class="text-stone-800">{{ $item->product_name }} (x{{ $item->quantity }})</span>
                                        <span class="font-semibold text-stone-900">₹{{ number_format($item->subtotal, 2) }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pt-2 border-t border-stone-100 flex justify-between font-bold text-stone-900 text-sm">
                                <span>Total:</span>
                                <span>₹{{ number_format($order->grand_total, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 text-center">
                        <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! Can you check the live status of order #' . $order->order_number . '?') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold transition">
                            <span>Need Help with Delivery? Chat on WhatsApp</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-2xl border border-stone-200 p-8 text-center space-y-3">
                    <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-full flex items-center justify-center mx-auto text-xl">✕</div>
                    <h3 class="font-serif text-xl font-bold text-stone-900">Order Not Found</h3>
                    <p class="text-xs text-stone-500 max-w-md mx-auto">
                        We couldn't find an order matching reference "<strong class="text-stone-900">{{ $orderNumber }}</strong>". Please double check your order number or phone/email.
                    </p>
                    <a href="https://wa.me/918946966292" target="_blank" class="inline-block text-xs font-semibold text-amber-800 underline">
                        Contact WhatsApp Support for Assistance
                    </a>
                </div>
            @endif
        @endif
    </div>
</x-layouts.app>

