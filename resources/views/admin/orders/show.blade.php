<x-layouts.admin :header="'Order Details: #' . $order->order_number">
    <div class="space-y-8 max-w-5xl">
        <!-- Top Action Bar -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-amber-800 font-bold hover:underline">
                ← Back to All Orders
            </a>
            <div class="flex items-center gap-2">
                <a href="{{ route('checkout.confirmation', $order->order_number) }}" target="_blank" class="px-4 py-2 bg-stone-200 text-stone-800 rounded-lg text-xs font-semibold hover:bg-stone-300 transition">
                    View Public Receipt
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->customer_phone) }}?text={{ urlencode('Hello ' . $order->customer_name . '! Update regarding your Raatrani order #' . $order->order_number . ':') }}" target="_blank" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold transition flex items-center gap-1.5">
                    <span>Message Customer on WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Fulfillment & Status Update Box -->
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
            <h3 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3 mb-4">
                Update Order Status & Dispatch Courier
            </h3>

            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Order Status</label>
                    <select name="order_status" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg font-semibold">
                        <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $order->order_status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing / Packing</option>
                        <option value="shipped" {{ $order->order_status === 'shipped' ? 'selected' : '' }}>Shipped (In Transit)</option>
                        <option value="delivered" {{ $order->order_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->order_status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Payment Status</label>
                    <select name="payment_status" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg font-semibold">
                        <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Tracking Number / AWB</label>
                    <input type="text" name="tracking_number" value="{{ old('tracking_number', $order->tracking_number) }}" placeholder="e.g. DELHIVERY8921" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg font-mono">
                </div>

                <div>
                    <button type="submit" class="w-full py-2 bg-amber-800 hover:bg-amber-700 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                        Update Order
                    </button>
                </div>
            </form>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Customer & Shipping -->
            <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-3 text-xs">
                <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider border-b border-stone-100 pb-2">
                    Customer Information
                </h4>
                <div class="space-y-1.5 text-stone-700">
                    <p><strong class="text-stone-900">Name:</strong> {{ $order->customer_name }}</p>
                    <p><strong class="text-stone-900">Email:</strong> {{ $order->customer_email }}</p>
                    <p><strong class="text-stone-900">Phone:</strong> {{ $order->customer_phone }}</p>
                    <p><strong class="text-stone-900">Delivery Address:</strong><br>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}</p>
                    @if($order->notes)
                        <div class="p-2 bg-amber-50 rounded border border-amber-200 text-amber-900 mt-2">
                            <strong>Note:</strong> {{ $order->notes }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Financials -->
            <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-3 text-xs">
                <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider border-b border-stone-100 pb-2">
                    Payment Breakdown
                </h4>
                <div class="space-y-2 text-stone-700">
                    <div class="flex justify-between">
                        <span>Items Subtotal:</span>
                        <span class="font-bold text-stone-900">₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    @if($order->discount_amount > 0)
                        <div class="flex justify-between text-emerald-700">
                            <span>Discount ({{ $order->coupon_code }}):</span>
                            <span>- ₹{{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span>Shipping Fee:</span>
                        <span class="font-bold text-stone-900">₹{{ number_format($order->shipping_fee, 2) }}</span>
                    </div>
                    <div class="pt-2 border-t border-stone-200 flex justify-between text-sm font-bold text-stone-900">
                        <span>Total Paid / Payable:</span>
                        <span class="text-amber-900 font-serif text-base">₹{{ number_format($order->grand_total, 2) }}</span>
                    </div>
                    <p class="text-stone-500 pt-1">Payment Method: <strong class="uppercase text-stone-800">{{ $order->payment_method }}</strong></p>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
            <h4 class="font-serif text-base font-bold text-stone-900 border-b border-stone-100 pb-3 mb-4">
                Order Items ({{ $order->items->count() }})
            </h4>

            <div class="divide-y divide-stone-100">
                @foreach($order->items as $item)
                    <div class="py-3 flex items-center justify-between text-xs">
                        <div class="flex items-center gap-3">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" class="w-12 h-14 object-cover rounded bg-stone-100 border">
                            @endif
                            <div>
                                <h5 class="font-bold text-stone-900">{{ $item->product_name }}</h5>
                                @if($item->selected_option)
                                    <p class="text-stone-500">Selected: {{ $item->selected_option }}</p>
                                @endif
                                <p class="text-stone-500">₹{{ number_format($item->product_price, 2) }} × {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <span class="font-bold text-stone-900 text-sm">₹{{ number_format($item->subtotal, 2) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.admin>

