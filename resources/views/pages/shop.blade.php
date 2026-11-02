<x-layouts.app title="Shop Handcrafted Living & Robes | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-stone-500 mb-3">
                <a href="{{ route('home') }}" class="hover:text-stone-900 transition">Home</a>
                <span>/</span>
                <span class="text-stone-900 font-medium">
                    @if($currentCategory)
                        {{ $currentCategory->name }}
                    @elseif($currentCollection)
                        {{ $currentCollection->name }}
                    @elseif(request('q'))
                        Search: "{{ request('q') }}"
                    @else
                        All Products
                    @endif
                </span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900">
                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @elseif($currentCollection)
                            {{ $currentCollection->name }}
                        @elseif(request('q'))
                            Search Results for "{{ request('q') }}"
                        @else
                            Complete Handcrafted Catalog
                        @endif
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-600 mt-1 max-w-2xl">
                        @if($currentCategory)
                            {{ $currentCategory->description }}
                        @elseif($currentCollection)
                            {{ $currentCollection->description }}
                        @else
                            Slow-crafted 100% pure cotton bedsheets, waffle bathrobes, diwan sets, reversible dohars, quilts, and bags stamped by Jaipur artisans.
                        @endif
                    </p>
                </div>
                <div class="text-xs text-stone-500 font-medium shrink-0">
                    Showing <strong class="text-stone-900">{{ $products->total() }}</strong> artisan creations
                </div>
            </div>

            <!-- Active Filter Badges -->
            @if(request()->anyFilled(['category', 'collection', 'craft', 'q', 'min_price', 'max_price']))
                <div class="flex flex-wrap items-center gap-2 mt-4 pt-4 border-t border-stone-100">
                    <span class="text-xs text-stone-500">Active Filters:</span>
                    @if(request('category'))
                        <a href="{{ request()->fullUrlWithoutQuery(['category', 'page']) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 rounded-full text-xs">
                            <span>Category: {{ $currentCategory?->name ?? request('category') }}</span>
                            <span class="text-amber-700 font-bold">✕</span>
                        </a>
                    @endif
                    @if(request('collection'))
                        <a href="{{ request()->fullUrlWithoutQuery(['collection', 'page']) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 rounded-full text-xs">
                            <span>Collection: {{ $currentCollection?->name ?? request('collection') }}</span>
                            <span class="text-amber-700 font-bold">✕</span>
                        </a>
                    @endif
                    @if(request('craft'))
                        <a href="{{ request()->fullUrlWithoutQuery(['craft', 'page']) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 rounded-full text-xs">
                            <span>Craft: {{ request('craft') }}</span>
                            <span class="text-amber-700 font-bold">✕</span>
                        </a>
                    @endif
                    @if(request('q'))
                        <a href="{{ request()->fullUrlWithoutQuery(['q', 'page']) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 rounded-full text-xs">
                            <span>Search: {{ request('q') }}</span>
                            <span class="text-amber-700 font-bold">✕</span>
                        </a>
                    @endif
                    <a href="{{ route('shop.index') }}" class="text-xs text-stone-500 hover:text-rose-600 underline ml-2">Clear all</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Catalog Body -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Left Filter Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Mobile Filter Toggle (hidden on desktop) -->
                <div class="lg:hidden flex items-center justify-between pb-4 border-b border-stone-200">
                    <button type="button" onclick="document.getElementById('mobile-filter-drawer').classList.toggle('hidden')" class="px-4 py-2 border border-stone-300 rounded-lg text-xs font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span>Filter & Refine</span>
                    </button>
                    <!-- Sort Selection for Mobile -->
                    <form method="GET" action="{{ url()->current() }}">
                        @foreach(request()->except(['sort', 'page']) as $k => $v)
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach
                        <select name="sort" onchange="this.form.submit()" class="text-xs border border-stone-300 rounded-lg px-2.5 py-2 bg-white">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="bestselling" {{ request('sort') == 'bestselling' ? 'selected' : '' }}>Bestselling</option>
                        </select>
                    </form>
                </div>

                <!-- Desktop Sidebar Filters -->
                <div id="mobile-filter-drawer" class="hidden lg:block space-y-6">
                    
                    <!-- Search inside catalog -->
                    <div class="bg-white p-4 rounded-xl border border-stone-200">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-2.5">Search Catalog</h4>
                        <form action="{{ route('shop.index') }}" method="GET">
                            @foreach(request()->except(['q', 'page']) as $k => $v)
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endforeach
                            <div class="relative">
                                <input 
                                    type="text" 
                                    name="q" 
                                    value="{{ request('q') }}" 
                                    placeholder="Keywords e.g. waffle, dohar..." 
                                    class="w-full text-xs pl-8 pr-3 py-2 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-600"
                                >
                                <svg class="w-4 h-4 text-stone-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Filter -->
                    <div class="bg-white p-4 rounded-xl border border-stone-200">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-3">Categories</h4>
                        <div class="space-y-1.5 max-h-64 overflow-y-auto pr-1">
                            <a href="{{ request()->fullUrlWithoutQuery(['category', 'page']) }}" class="flex items-center justify-between text-xs py-1 px-2 rounded hover:bg-stone-50 {{ !request('category') ? 'font-bold text-amber-900 bg-amber-50' : 'text-stone-700' }}">
                                <span>All Categories</span>
                            </a>
                            @foreach($allCategories as $cat)
                                <a href="{{ request()->fullUrlWithQuery(['category' => $cat->slug, 'page' => null]) }}" class="flex items-center justify-between text-xs py-1 px-2 rounded hover:bg-stone-50 {{ request('category') === $cat->slug ? 'font-bold text-amber-900 bg-amber-50' : 'text-stone-600' }}">
                                    <span>{{ $cat->name }}</span>
                                    <span class="text-[10px] text-stone-400">{{ $cat->products_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Collections Filter -->
                    <div class="bg-white p-4 rounded-xl border border-stone-200">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-3">Signature Collections</h4>
                        <div class="space-y-1.5">
                            @foreach($allCollections as $col)
                                <a href="{{ request()->fullUrlWithQuery(['collection' => $col->slug, 'page' => null]) }}" class="flex items-center justify-between text-xs py-1 px-2 rounded hover:bg-stone-50 {{ request('collection') === $col->slug ? 'font-bold text-amber-900 bg-amber-50' : 'text-stone-600' }}">
                                    <span>{{ $col->name }}</span>
                                    <span class="text-[10px] text-stone-400">{{ $col->products_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Craft Techniques -->
                    <div class="bg-white p-4 rounded-xl border border-stone-200">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-3">Craft & Technique</h4>
                        <div class="space-y-1.5 text-xs text-stone-600">
                            <a href="{{ request()->fullUrlWithQuery(['craft' => 'Block Print', 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('craft') === 'Block Print' ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Jaipur Hand Block Print</a>
                            <a href="{{ request()->fullUrlWithQuery(['craft' => 'Waffle', 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('craft') === 'Waffle' ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Honeycomb Waffle Weave</a>
                            <a href="{{ request()->fullUrlWithQuery(['craft' => 'Kantha', 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('craft') === 'Kantha' ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Kantha Hand Quilting</a>
                            <a href="{{ request()->fullUrlWithQuery(['craft' => 'Kalamkari', 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('craft') === 'Kalamkari' ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Kalamkari Motifs</a>
                            <a href="{{ request()->fullUrlWithQuery(['craft' => 'Jute', 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('craft') === 'Jute' ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Natural Jute & Cotton</a>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="bg-white p-4 rounded-xl border border-stone-200">
                        <h4 class="font-serif text-sm font-bold text-stone-900 uppercase tracking-wider mb-3">Price Range</h4>
                        <div class="space-y-1.5 text-xs text-stone-600">
                            <a href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => 1500, 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('max_price') == 1500 ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Under ₹1,500</a>
                            <a href="{{ request()->fullUrlWithQuery(['min_price' => 1500, 'max_price' => 2500, 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('min_price') == 1500 && request('max_price') == 2500 ? 'font-bold text-amber-900 bg-amber-50' : '' }}">₹1,500 - ₹2,500</a>
                            <a href="{{ request()->fullUrlWithQuery(['min_price' => 2500, 'max_price' => 4000, 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('min_price') == 2500 && request('max_price') == 4000 ? 'font-bold text-amber-900 bg-amber-50' : '' }}">₹2,500 - ₹4,000</a>
                            <a href="{{ request()->fullUrlWithQuery(['min_price' => 4000, 'max_price' => null, 'page' => null]) }}" class="block py-1 px-2 rounded hover:bg-stone-50 {{ request('min_price') == 4000 ? 'font-bold text-amber-900 bg-amber-50' : '' }}">Above ₹4,000</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Products Grid Area -->
            <div class="lg:col-span-3">
                
                <!-- Desktop Top Sort Bar -->
                <div class="hidden lg:flex items-center justify-between pb-4 mb-6 border-b border-stone-200">
                    <p class="text-xs text-stone-500">
                        Showing <strong class="text-stone-800">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong> of <strong class="text-stone-800">{{ $products->total() }}</strong> pieces
                    </p>

                    <form method="GET" action="{{ url()->current() }}" class="flex items-center gap-2 text-xs">
                        @foreach(request()->except(['sort', 'page']) as $k => $v)
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach
                        <label for="sort-select" class="text-stone-500 font-medium">Sort By:</label>
                        <select id="sort-select" name="sort" onchange="this.form.submit()" class="border border-stone-300 rounded-lg px-3 py-1.5 bg-white text-stone-800 focus:outline-none focus:border-amber-600">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Drops</option>
                            <option value="bestselling" {{ request('sort') == 'bestselling' ? 'selected' : '' }}>Bestselling</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                        </select>
                    </form>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-20 bg-white rounded-2xl border border-stone-200 p-8">
                        <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-4 text-amber-800">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="font-serif text-2xl font-bold text-stone-900 mb-2">No matching products found</h3>
                        <p class="text-xs text-stone-500 max-w-md mx-auto mb-6">
                            Try adjusting your filters or search keywords, or message our studio directly on WhatsApp for custom requests.
                        </p>
                        <a href="{{ route('shop.index') }}" class="inline-block px-6 py-2.5 bg-stone-900 text-white rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-stone-800 transition">
                            View All Products
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layouts.app>

