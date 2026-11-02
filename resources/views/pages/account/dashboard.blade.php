<x-layouts.app title="My Account & Orders | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Customer Portal</span>
                    <h1 class="font-serif text-3xl font-bold text-stone-900 mt-0.5">Welcome, {{ $user->name }}</h1>
                    <p class="text-xs text-stone-500">{{ $user->email }}</p>
                </div>
                <div class="flex items-center gap-2">
                    @if($user->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-amber-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-amber-700 transition">
                            Admin Portal
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded-lg text-xs font-semibold uppercase tracking-wider transition cursor-pointer">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left: Order History (8 cols) -->
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
                    <h3 class="font-serif text-lg font-bold text-stone-900 border-b border-stone-100 pb-3 mb-4">
                        Order History ({{ $orders->count() }})
                    </h3>

                    @if($orders->count() > 0)
                        <div class="space-y-4">
                            @foreach($orders as $ord)
                                <div class="p-4 rounded-xl border border-stone-200 bg-stone-50/50 space-y-3">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-stone-200/60 pb-2.5 text-xs">
                                        <div>
                                            <span class="font-bold text-stone-900 font-mono text-sm">#{{ $ord->order_number }}</span>
                                            <span class="text-stone-400 ml-2">{{ $ord->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $ord->order_status === 'delivered' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-900' }}">
                                                {{ $ord->order_status }}
                                            </span>
                                            <span class="font-bold text-stone-900">₹{{ number_format($ord->grand_total, 2) }}</span>
                                        </div>
                                    </div>

                                    <!-- Items in order -->
                                    <div class="space-y-2">
                                        @foreach($ord->items as $item)
                                            <div class="flex items-center justify-between text-xs">
                                                <div class="flex items-center gap-2">
                                                    @if($item->image)
                                                        <img src="{{ asset($item->image) }}" class="w-10 h-12 object-cover rounded bg-stone-100 border">
                                                    @endif
                                                    <div>
                                                        <p class="font-semibold text-stone-900">{{ $item->product_name }}</p>
                                                        @if($item->selected_option)
                                                            <p class="text-[11px] text-stone-400">Size: {{ $item->selected_option }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <span class="text-stone-500">Qty: {{ $item->quantity }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Action Links -->
                                    <div class="pt-2 flex items-center justify-between text-xs">
                                        <a href="{{ route('checkout.confirmation', $ord->order_number) }}" class="text-amber-800 font-semibold hover:underline">
                                            View Full Receipt →
                                        </a>
                                        <a href="{{ route('order.track.index') }}?order_number={{ $ord->order_number }}&identifier={{ urlencode($ord->customer_email) }}" class="text-stone-700 font-semibold hover:text-stone-900">
                                            Track Shipment
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-stone-500 text-xs">
                            <p class="mb-3">You haven't placed any orders yet.</p>
                            <a href="{{ route('shop.index') }}" class="inline-block px-5 py-2 bg-stone-900 text-white rounded-lg font-semibold uppercase tracking-wider text-[11px]">
                                Start Shopping
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Saved Address & Profile (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-xs">
                    <h3 class="font-serif text-lg font-bold text-stone-900 border-b border-stone-100 pb-3 mb-4">
                        Saved Profile & Address
                    </h3>

                    <form action="{{ route('account.profile.update') }}" method="POST" class="space-y-3.5">
                        @csrf

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Phone</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Address</label>
                            <textarea name="address" rows="2" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">City</label>
                                <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">PIN Code</label>
                                <input type="text" name="pincode" value="{{ old('pincode', $user->pincode) }}" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">State</label>
                            <input type="text" name="state" value="{{ old('state', $user->state) }}" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                            Save Changes
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>

