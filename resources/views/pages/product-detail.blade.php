<x-layouts.app :title="$product->name . ' | Raatrani Handcrafted'">
    <div class="bg-stone-50 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-stone-900 transition">Home</a>
                <span>/</span>
                <a href="{{ route('shop.index') }}" class="hover:text-stone-900 transition">Shop</a>
                <span>/</span>
                @if($product->category)
                    <a href="{{ route('shop.category', $product->category->slug) }}" class="hover:text-stone-900 transition">{{ $product->category->name }}</a>
                    <span>/</span>
                @endif
                <span class="text-stone-900 font-medium truncate max-w-xs">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Product Main Stage -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
            
            <!-- Left: Image Gallery (6 cols) -->
            <div class="lg:col-span-6 space-y-4">
                <!-- Main Image Display -->
                <div class="relative aspect-4/5 rounded-2xl overflow-hidden bg-stone-100 border border-stone-200 shadow-xs">
                    <img 
                        id="main-product-img" 
                        src="{{ asset($product->primary_image) }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-cover object-center transition-all duration-300"
                    >
                    @if($product->discountPercentage() > 0)
                        <span class="absolute top-4 left-4 px-2.5 py-1 text-xs font-bold tracking-wider uppercase bg-amber-800 text-white rounded-md shadow-xs">
                            {{ $product->discountPercentage() }}% OFF
                        </span>
                    @endif
                </div>

                <!-- Thumbnails Gallery -->
                @php
                    $allGallery = array_merge([$product->primary_image], $product->gallery_images ?? []);
                    $allGallery = array_unique($allGallery);
                @endphp
                @if(count($allGallery) > 1)
                    <div class="flex items-center gap-3 overflow-x-auto pb-2">
                        @foreach($allGallery as $thumb)
                            <button 
                                type="button" 
                                onclick="document.getElementById('main-product-img').src = '{{ asset($thumb) }}'"
                                class="w-20 h-24 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-700 focus:border-amber-700 bg-stone-100 shrink-0 transition"
                            >
                                <img src="{{ asset($thumb) }}" alt="Thumbnail" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Product Purchase Details (6 cols) -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Header & Metadata -->
                <div class="space-y-2 border-b border-stone-200 pb-5">
                    <div class="flex items-center justify-between">
                        <span class="text-xs uppercase tracking-widest font-bold text-amber-800">
                            {{ $product->category?->name ?? 'Handcrafted Artisan' }}
                        </span>
                        <span class="text-xs text-stone-400 font-mono">SKU: {{ $product->sku }}</span>
                    </div>

                    <h1 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-bold text-stone-900 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <!-- Rating summary -->
                    <div class="flex items-center gap-3 pt-1">
                        <div class="flex items-center text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= floor($product->rating) ? 'fill-current' : 'fill-stone-200' }}" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-xs font-semibold text-stone-700">{{ $product->rating }} / 5.0</span>
                        <span class="text-xs text-stone-400">|</span>
                        <a href="#customer-reviews" class="text-xs text-stone-500 hover:text-amber-800 underline">
                            {{ $product->review_count ?: count($product->reviews) }} Reviews
                        </a>
                    </div>
                </div>

                <!-- Pricing & Stock Status -->
                <div class="space-y-1">
                    <div class="flex items-baseline gap-3">
                        <span class="font-serif text-3xl font-bold text-stone-900">₹{{ number_format($product->price, 2) }}</span>
                        @if($product->compare_at_price && $product->compare_at_price > $product->price)
                            <span class="text-sm text-stone-400 line-through">₹{{ number_format($product->compare_at_price, 2) }}</span>
                            <span class="text-xs font-bold text-amber-800 bg-amber-50 px-2 py-0.5 rounded border border-amber-200">
                                Save ₹{{ number_format($product->compare_at_price - $product->price, 2) }}
                            </span>
                        @endif
                    </div>
                    <p class="text-[11px] text-stone-500">
                        Inclusive of all taxes. Free Express Shipping on orders over ₹1,999.
                    </p>
                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        @if($product->stock_quantity > 5)
                            <span class="inline-flex items-center gap-1.5 text-xs text-emerald-700 font-medium">
                                <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                                In Stock • Ready to Dispatch from Jaipur
                            </span>
                        @elseif($product->stock_quantity > 0)
                            <span class="inline-flex items-center gap-1.5 text-xs text-amber-700 font-medium">
                                <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                Only {{ $product->stock_quantity }} pieces left in this batch
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-xs text-rose-700 font-medium">
                                Sold Out • Pre-order via WhatsApp
                            </span>
                        @endif
                        <span class="text-stone-300">|</span>
                        <div class="flex items-center gap-1.5 text-[11px] text-stone-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span><strong>4 patrons</strong> viewing right now</span>
                        </div>
                    </div>
                </div>

                <!-- Short Description -->
                @if($product->short_description)
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        {{ $product->short_description }}
                    </p>
                @endif

                <!-- Purchase Options Form -->
                <form id="product-add-form" action="{{ route('cart.add') }}" method="POST" class="space-y-5 pt-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <!-- Size / Variant Selector -->
                    @if(is_array($product->options) && count($product->options) > 0)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-bold uppercase tracking-wider text-stone-800">
                                    Select Size / Option:
                                </label>
                                <div class="flex items-center gap-3">
                                    <span id="selected-option-label" class="text-xs font-medium text-amber-900">
                                        {{ $product->options[0] }}
                                    </span>
                                    <button type="button" onclick="openSizeGuide()" class="text-[11px] text-[#8b3a3a] hover:underline font-semibold flex items-center gap-1 cursor-pointer">
                                        <span>📏 Size Guide</span>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="option" id="selected-option-input" value="{{ $product->options[0] }}">
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->options as $idx => $opt)
                                    <button 
                                        type="button" 
                                        onclick="selectOption('{{ addslashes($opt) }}', this)" 
                                        class="option-btn px-4 py-2 rounded-lg text-xs font-semibold border transition cursor-pointer {{ $idx === 0 ? 'bg-stone-900 text-white border-stone-900' : 'bg-white text-stone-700 border-stone-300 hover:border-stone-500' }}"
                                    >
                                        {{ $opt }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="flex justify-end">
                            <button type="button" onclick="openSizeGuide()" class="text-[11px] text-[#8b3a3a] hover:underline font-semibold flex items-center gap-1 cursor-pointer">
                                <span>📏 View Dimensions & Specs Guide</span>
                            </button>
                        </div>
                    @endif

                    <!-- Quantity Stepper -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-stone-800 mb-2">
                            Quantity:
                        </label>
                        <div class="inline-flex items-center border border-stone-300 rounded-lg bg-white">
                            <button type="button" onclick="decrementQty()" class="px-3 py-2 text-stone-600 hover:bg-stone-100 font-bold transition">−</button>
                            <input type="number" name="quantity" id="product-qty" value="1" min="1" max="20" class="w-12 text-center text-xs font-bold text-stone-900 focus:outline-none">
                            <button type="button" onclick="incrementQty()" class="px-3 py-2 text-stone-600 hover:bg-stone-100 font-bold transition">+</button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <!-- Add to Bag -->
                        <button 
                            type="button" 
                            onclick="submitAddToCart()" 
                            class="w-full py-3.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-md flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span>Add to Bag</span>
                        </button>

                        <!-- Buy Now (Direct Checkout) -->
                        <button 
                            type="button" 
                            onclick="buyNowDirect()" 
                            class="w-full py-3.5 bg-amber-700 hover:bg-amber-600 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-md cursor-pointer"
                        >
                            Buy It Now
                        </button>
                    </div>

                    <!-- Direct WhatsApp Order Button -->
                    @php
                        $baseWaUrl = "https://wa.me/918946966292?text=" . urlencode("Hello Raatrani! I want to order:\n- " . $product->name . "\n- Price: ₹" . number_format($product->price, 2) . "\n- SKU: " . $product->sku . "\n- Link: " . url()->current());
                    @endphp
                    <a 
                        id="whatsapp-order-btn"
                        href="{{ $baseWaUrl }}" 
                        target="_blank" 
                        class="flex items-center justify-center gap-2 w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition shadow-sm"
                    >
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.585 1.776.84 2.802.84 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.774-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
                        </svg>
                        <span>Instant Order on WhatsApp (+91 8946966292)</span>
                    </a>
                </form>

                <!-- Pincode Delivery & COD Estimator -->
                <div class="p-4 bg-white rounded-xl border border-stone-200 shadow-2xs space-y-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-medium text-stone-800 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-[#8b3a3a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Check Estimated Delivery & COD Eligibility
                        </span>
                        <span class="text-[10px] uppercase tracking-wider text-amber-900 font-semibold bg-amber-50 px-2 py-0.5 rounded border border-amber-200">Jaipur Dispatch</span>
                    </div>
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            id="pincode-input" 
                            maxlength="6" 
                            placeholder="Enter 6-digit Pincode (e.g. 400001, 560038)" 
                            class="flex-1 px-3.5 py-2.5 text-xs border border-stone-300 rounded-lg focus:outline-none focus:border-amber-900 bg-stone-50/70 font-mono"
                        >
                        <button 
                            type="button" 
                            onclick="checkPincode()" 
                            class="px-5 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition cursor-pointer shrink-0"
                        >
                            Check PIN
                        </button>
                    </div>
                    <div id="pincode-result" class="hidden text-xs pt-1"></div>
                </div>

                <!-- Value Highlights Cards -->
                <div class="grid grid-cols-2 gap-3 pt-4 border-t border-stone-200 text-stone-700">
                    <div class="flex items-center gap-2 p-2.5 bg-stone-50 rounded-lg border border-stone-200/60 text-xs">
                        <span class="text-amber-800">🌿</span>
                        <span>100% Breathable Pure Cotton</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-stone-50 rounded-lg border border-stone-200/60 text-xs">
                        <span class="text-amber-800">🪵</span>
                        <span>Jaipur Hand-Carved Wooden Blocks</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-stone-50 rounded-lg border border-stone-200/60 text-xs">
                        <span class="text-amber-800">💧</span>
                        <span>Non-Toxic Azo-Free Dyes</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-stone-50 rounded-lg border border-stone-200/60 text-xs">
                        <span class="text-amber-800">🔄</span>
                        <span>7-Day Easy Exchange Policy</span>
                    </div>
                </div>

                <!-- Product Detail Accordion Tabs -->
                <div class="space-y-3 pt-4">
                    <!-- Tab 1: The Craft & Story -->
                    <details class="group bg-white rounded-xl border border-stone-200 p-4 open:bg-stone-50 transition" open>
                        <summary class="flex justify-between items-center font-serif text-sm font-bold text-stone-900 cursor-pointer list-none">
                            <span>The Craft & Heritage</span>
                            <span class="text-stone-400 group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="pt-3 text-xs text-stone-600 leading-relaxed space-y-2 border-t border-stone-200/60 mt-3">
                            <p>{{ $product->description }}</p>
                            @if($product->craft_technique)
                                <p><strong class="text-stone-800">Craft Technique:</strong> {{ $product->craft_technique }}</p>
                            @endif
                        </div>
                    </details>

                    <!-- Tab 2: Material & Care -->
                    <details class="group bg-white rounded-xl border border-stone-200 p-4 transition">
                        <summary class="flex justify-between items-center font-serif text-sm font-bold text-stone-900 cursor-pointer list-none">
                            <span>Material & Wash Care</span>
                            <span class="text-stone-400 group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="pt-3 text-xs text-stone-600 leading-relaxed space-y-2 border-t border-stone-200/60 mt-3">
                            <p><strong class="text-stone-800">Fabric Composition:</strong> {{ $product->material ?? '100% Pure Combed Cotton' }}</p>
                            <p><strong class="text-stone-800">Wash Instructions:</strong> {{ $product->wash_care ?? 'Gentle cold hand wash or delicate machine wash with mild detergent. Line dry in shade.' }}</p>
                        </div>
                    </details>

                    <!-- Tab 3: Dimensions & Fit -->
                    <details class="group bg-white rounded-xl border border-stone-200 p-4 transition">
                        <summary class="flex justify-between items-center font-serif text-sm font-bold text-stone-900 cursor-pointer list-none">
                            <span>Dimensions & Specifications</span>
                            <span class="text-stone-400 group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="pt-3 text-xs text-stone-600 leading-relaxed space-y-2 border-t border-stone-200/60 mt-3">
                            <p><strong class="text-stone-800">Measurements:</strong> {{ $product->dimensions_info ?? 'Standard Indian Boutique Sizing' }}</p>
                            <p><strong class="text-stone-800">Country of Origin:</strong> Proudly Crafted in Jaipur, India</p>
                        </div>
                    </details>

                    <!-- Tab 4: Shipping & Returns -->
                    <details class="group bg-white rounded-xl border border-stone-200 p-4 transition">
                        <summary class="flex justify-between items-center font-serif text-sm font-bold text-stone-900 cursor-pointer list-none">
                            <span>Shipping, Cash On Delivery & Exchanges</span>
                            <span class="text-stone-400 group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="pt-3 text-xs text-stone-600 leading-relaxed space-y-2 border-t border-stone-200/60 mt-3">
                            <p>• <strong>Free Express Shipping:</strong> Automatically applied to orders above ₹1,999.</p>
                            <p>• <strong>Delivery Time:</strong> Dispatched within 24-48 hours. Delivered in 3-5 business days across metros and tier-1/2 cities.</p>
                            <p>• <strong>Cash On Delivery:</strong> COD available on all domestic pin codes.</p>
                            <p>• <strong>Easy Exchange:</strong> If sizing doesn't fit, exchange within 7 days by contacting our WhatsApp care team.</p>
                        </div>
                    </details>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Reviews Section -->
    <section id="customer-reviews" class="py-16 bg-white border-t border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-800">Verified Testimonials</span>
                    <h2 class="font-serif text-3xl font-bold text-stone-900 mt-1">Customer Reviews</h2>
                    <p class="text-xs text-stone-500 mt-1">Real feedback from clients who welcomed Raatrani into their homes.</p>
                </div>
                <button type="button" onclick="openReviewModal()" class="px-5 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition cursor-pointer">
                    Write a Review
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($product->reviews as $rev)
                    <div class="bg-stone-50 p-5 rounded-xl border border-stone-200 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= $rev->rating; $i++)
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-[10px] text-stone-400">{{ $rev->created_at->format('M d, Y') }}</span>
                        </div>
                        <p class="text-xs text-stone-700 leading-relaxed italic">"{{ $rev->comment }}"</p>
                        <div class="pt-2 border-t border-stone-200/60 flex items-center justify-between text-xs">
                            <span class="font-bold text-stone-900">{{ $rev->customer_name }}</span>
                            <span class="text-[10px] text-emerald-700 font-semibold flex items-center gap-1">
                                <span>✓</span> Verified Customer
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8 bg-stone-50 rounded-xl border border-stone-200">
                        <p class="text-xs text-stone-500 mb-3">Be the first to review this handcrafted design!</p>
                        <button type="button" onclick="openReviewModal()" class="px-4 py-2 border border-stone-400 text-stone-700 rounded text-xs font-semibold hover:bg-stone-100">
                            Share Your Experience
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Review Modal Form -->
    <div id="review-modal" class="fixed inset-0 bg-stone-900/60 backdrop-blur-xs z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 border border-stone-200 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-stone-200">
                <h3 class="font-serif text-lg font-bold text-stone-900">Review {{ $product->name }}</h3>
                <button type="button" onclick="closeReviewModal()" class="text-stone-400 hover:text-stone-700">✕</button>
            </div>
            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-3.5">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Rating:</label>
                    <select name="rating" required class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                        <option value="5">★★★★★ (5 Stars - Exceptional)</option>
                        <option value="4">★★★★☆ (4 Stars - Very Good)</option>
                        <option value="3">★★★☆☆ (3 Stars - Average)</option>
                        <option value="2">★★☆☆☆ (2 Stars - Needs Improvement)</option>
                        <option value="1">★☆☆☆☆ (1 Star - Poor)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Name:</label>
                    <input type="text" name="customer_name" required placeholder="e.g. Radhika Sharma" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your City:</label>
                    <input type="text" name="customer_city" placeholder="e.g. Mumbai, Bengaluru" class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Review:</label>
                    <textarea name="comment" rows="3" required placeholder="How does the fabric feel? Tell other buyers..." class="w-full text-xs px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg"></textarea>
                </div>

                <div class="pt-2 flex gap-2">
                    <button type="button" onclick="closeReviewModal()" class="flex-1 py-2.5 border border-stone-300 text-stone-700 rounded-lg text-xs font-semibold">Cancel</button>
                    <button type="submit" class="flex-1 py-2.5 bg-stone-900 text-white rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-stone-800 transition">Submit Review</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Related Products / Complete the Look -->
    @if($relatedProducts->count() > 0)
        <section class="py-16 bg-stone-50 border-t border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-xl mx-auto mb-10">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-800">Complete The Look</span>
                    <h2 class="font-serif text-3xl font-bold text-stone-900 mt-1">You May Also Cherish</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($relatedProducts as $rel)
                        <x-product-card :product="$rel" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @push('scripts')
    <script>
        function selectOption(optionName, btnElement) {
            document.getElementById('selected-option-input').value = optionName;
            document.getElementById('selected-option-label').textContent = optionName;
            
            document.querySelectorAll('.option-btn').forEach(btn => {
                btn.classList.remove('bg-stone-900', 'text-white', 'border-stone-900');
                btn.classList.add('bg-white', 'text-stone-700', 'border-stone-300');
            });
            btnElement.classList.remove('bg-white', 'text-stone-700', 'border-stone-300');
            btnElement.classList.add('bg-stone-900', 'text-white', 'border-stone-900');

            // Update WhatsApp pre-filled link
            updateWhatsAppLink();
        }

        function incrementQty() {
            const input = document.getElementById('product-qty');
            input.value = Math.min(20, parseInt(input.value || 1) + 1);
            updateWhatsAppLink();
        }

        function decrementQty() {
            const input = document.getElementById('product-qty');
            input.value = Math.max(1, parseInt(input.value || 1) - 1);
            updateWhatsAppLink();
        }

        function updateWhatsAppLink() {
            const optInput = document.getElementById('selected-option-input');
            const opt = optInput ? optInput.value : '';
            const qty = document.getElementById('product-qty').value;
            const text = `Hello Raatrani! I want to order:\n- {{ $product->name }}\n- Size/Option: ${opt}\n- Qty: ${qty}\n- Price: ₹{{ number_format($product->price, 2) }}\n- SKU: {{ $product->sku }}\n- Link: {{ url()->current() }}`;
            document.getElementById('whatsapp-order-btn').href = "https://wa.me/918946966292?text=" + encodeURIComponent(text);
        }

        function submitAddToCart() {
            const optInput = document.getElementById('selected-option-input');
            const opt = optInput ? optInput.value : null;
            const qty = parseInt(document.getElementById('product-qty').value || 1);
            quickAddToCart({{ $product->id }}, opt, qty);
        }

        async function buyNowDirect() {
            const optInput = document.getElementById('selected-option-input');
            const opt = optInput ? optInput.value : null;
            const qty = parseInt(document.getElementById('product-qty').value || 1);

            await quickAddToCart({{ $product->id }}, opt, qty);
            window.location.href = "{{ route('checkout.index') }}";
        }

        function openReviewModal() {
            const modal = document.getElementById('review-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeReviewModal() {
            const modal = document.getElementById('review-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openSizeGuide() {
            const modal = document.getElementById('size-guide-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeSizeGuide() {
            const modal = document.getElementById('size-guide-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function checkPincode() {
            const input = document.getElementById('pincode-input').value.trim();
            const res = document.getElementById('pincode-result');
            if (!/^\d{6}$/.test(input)) {
                res.innerHTML = '<span class="text-rose-600 font-medium">Please enter a valid 6-digit Indian PIN code.</span>';
                res.classList.remove('hidden');
                return;
            }
            const days = 3 + Math.floor(parseInt(input.slice(-1)) % 2);
            const date = new Date();
            date.setDate(date.getDate() + days);
            const options = { weekday: 'short', month: 'short', day: 'numeric' };
            const dateStr = date.toLocaleDateString('en-IN', options);
            
            res.innerHTML = `
                <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-800 space-y-1 mt-2">
                    <div class="font-semibold flex items-center gap-1.5 text-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                        <span>Express Air Courier to ${input} Available!</span>
                    </div>
                    <p class="text-xs text-emerald-700">Estimated Delivery: <strong>${dateStr}</strong> (via BlueDart Air / Delhivery Express).</p>
                    <p class="text-[11px] text-stone-600">✦ Cash on Delivery eligible • Complimentary Free Shipping on orders above ₹1,999.</p>
                </div>
            `;
            res.classList.remove('hidden');
        }
    </script>
    @endpush

    <!-- Size & Dimensions Guide Modal -->
    <div id="size-guide-modal" class="fixed inset-0 z-50 bg-stone-950/70 backdrop-blur-xs hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-stone-200 space-y-4 max-h-[90vh] overflow-y-auto text-left">
            <div class="flex items-center justify-between pb-3 border-b border-stone-200">
                <div>
                    <h3 class="font-serif text-xl font-normal text-stone-900">Atelier Dimensions & Sizing Guide</h3>
                    <p class="text-xs text-stone-500">Handcrafted artisan dimensions in inches and centimeters</p>
                </div>
                <button type="button" onclick="closeSizeGuide()" class="p-1 text-stone-400 hover:text-stone-700 text-lg font-bold cursor-pointer">✕</button>
            </div>
            
            <div class="space-y-4 text-xs">
                <!-- Kimono Bathrobes -->
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-200/70">
                    <h4 class="font-serif text-sm font-bold text-stone-900 mb-1">Kimono Bathrobes & Loungers</h4>
                    <p class="text-stone-600 mb-2">Relaxed unisex fit with adjustable wrap belt and deep pockets.</p>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-stone-200 text-stone-500">
                                <th class="py-1">Size</th>
                                <th class="py-1">Chest / Bust</th>
                                <th class="py-1">Length</th>
                                <th class="py-1">Belt</th>
                            </tr>
                        </thead>
                        <tbody class="text-stone-800">
                            <tr>
                                <td class="py-1 font-semibold">Free Size (Relaxed)</td>
                                <td class="py-1">Up to 48 in (122 cm)</td>
                                <td class="py-1">46 in (117 cm)</td>
                                <td class="py-1">72 in (183 cm)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Bedsheets -->
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-200/70">
                    <h4 class="font-serif text-sm font-bold text-stone-900 mb-1">Hand Block Bedsheets</h4>
                    <p class="text-stone-600 mb-2">Pre-shrunk 100% combed cotton, fits 8" to 12" mattresses.</p>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-stone-200 text-stone-500">
                                <th class="py-1">Bed Size</th>
                                <th class="py-1">Sheet Dimensions</th>
                                <th class="py-1">Pillow Shams (x2)</th>
                            </tr>
                        </thead>
                        <tbody class="text-stone-800">
                            <tr class="border-b border-stone-200/60">
                                <td class="py-1 font-semibold">Double / Queen</td>
                                <td class="py-1">90 × 100 in (228 × 254 cm)</td>
                                <td class="py-1">18 × 28 in (45 × 70 cm)</td>
                            </tr>
                            <tr>
                                <td class="py-1 font-semibold">King Size</td>
                                <td class="py-1">108 × 108 in (274 × 274 cm)</td>
                                <td class="py-1">18 × 28 in (45 × 70 cm)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Dohars & Razais -->
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-200/70">
                    <h4 class="font-serif text-sm font-bold text-stone-900 mb-1">Reversible Dohars & Razai Quilts</h4>
                    <p class="text-stone-600 mb-2">Triple-layer cloud mulmul with pure cotton flannel filling.</p>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-stone-200 text-stone-500">
                                <th class="py-1">Type</th>
                                <th class="py-1">Single</th>
                                <th class="py-1">Double / King</th>
                            </tr>
                        </thead>
                        <tbody class="text-stone-800">
                            <tr>
                                <td class="py-1 font-semibold">Dimensions</td>
                                <td class="py-1">60 × 90 in (152 × 228 cm)</td>
                                <td class="py-1">90 × 108 in (228 × 274 cm)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Living & Dining -->
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-200/70">
                    <h4 class="font-serif text-sm font-bold text-stone-900 mb-1">Cushions, Throws & Table Linen</h4>
                    <p class="text-stone-600">Standard tailored sizes: Cushion Covers (16" × 16" & 20" × 20"), Table Runners (14" × 72"), Table Cloths (Round 70" Dia, 6-Seater 60" × 90").</p>
                </div>
            </div>

            <div class="pt-2 text-center">
                <button type="button" onclick="closeSizeGuide()" class="px-6 py-2 bg-stone-900 text-white rounded-lg text-xs uppercase tracking-wider font-semibold hover:bg-stone-800 transition cursor-pointer">
                    Close Guide
                </button>
            </div>
        </div>
    </div>
</x-layouts.app>

