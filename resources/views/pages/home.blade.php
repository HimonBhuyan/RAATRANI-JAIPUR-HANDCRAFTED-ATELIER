<x-layouts.app title="Raatrani | Atelier Jaipur • Handcrafted Pure Cotton Robes, Bedsheets & Quilts">
    
    <!-- Hero Section — The Jaipur Atelier Editorial Canvas -->
    <section class="relative bg-[#FAF7F2] overflow-hidden pt-8 pb-16 lg:pt-12 lg:pb-24 border-b border-[#ede6dc]">
        <!-- Subtle Decorative Arches / Soft Radial Lighting -->
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 rounded-full bg-amber-100/40 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-96 h-96 rounded-full bg-[#f3ece2]/60 blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Hero Left: The Editorial Story -->
                <div class="lg:col-span-7 space-y-7 text-center lg:text-left">
                    
                    <!-- Delicate Heritage Kicker -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-1.5 bg-white/90 border border-[#e2d9cd] rounded-full shadow-2xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#8b3a3a]"></span>
                        <span class="text-[10px] sm:text-[11px] uppercase tracking-[0.22em] text-[#8c7b6c] font-medium">Where Artistry Meets Comfort • Hand Block Printed</span>
                    </div>

                    <!-- Master Editorial Headline -->
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-normal tracking-tight text-stone-900 leading-[1.06]">
                        Pure Cotton Robes <br class="hidden sm:inline">
                        <span class="italic font-serif font-light text-[#8b3a3a]">& Heirloom Block Prints</span>
                    </h1>

                    <!-- Refined Poetic Copy -->
                    <p class="text-stone-600 text-sm sm:text-base max-w-xl mx-auto lg:mx-0 leading-relaxed font-light">
                        Step into slow, conscious living. Each bedsheet, waffle kimono bathrobe, and reversible mulmul dohar is hand-stamped with generational teak wood blocks in the sun-drenched courtyards of Jaipur.
                    </p>

                    <!-- Luxury Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('shop.index') }}" class="w-full sm:w-auto px-8 py-4 bg-[#141210] hover:bg-[#2c2623] text-[#FAF7F2] rounded-full text-xs font-medium uppercase tracking-[0.18em] transition-all duration-300 shadow-md text-center hover:scale-102 border border-amber-900/30">
                            Explore The Collection →
                        </a>
                        <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to explore your latest catalog and inquire about personal styling.') }}" target="_blank" class="w-full sm:w-auto px-7 py-4 bg-white/90 hover:bg-white text-stone-800 border border-[#ede6dc] rounded-full text-xs font-medium uppercase tracking-[0.16em] transition-all duration-300 flex items-center justify-center gap-2.5 shadow-2xs hover:shadow-xs">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>WhatsApp Concierge</span>
                        </a>
                    </div>

                    <!-- Trust Pillars / Craft Badges -->
                    <div class="pt-6 grid grid-cols-3 gap-2 sm:gap-6 border-t border-[#ede6dc] text-stone-700 max-w-lg mx-auto lg:mx-0">
                        <div>
                            <span class="block font-serif text-lg sm:text-2xl md:text-3xl font-normal text-stone-900">100%</span>
                            <span class="text-[8px] sm:text-[10px] uppercase tracking-wider text-[#8c7b6c] font-light leading-tight block mt-0.5">Pure Cotton</span>
                        </div>
                        <div>
                            <span class="block font-serif text-lg sm:text-2xl md:text-3xl font-normal text-stone-900">1,200+</span>
                            <span class="text-[8px] sm:text-[10px] uppercase tracking-wider text-[#8c7b6c] font-light leading-tight block mt-0.5">Hand Stamps</span>
                        </div>
                        <div>
                            <span class="block font-serif text-lg sm:text-2xl md:text-3xl font-normal text-stone-900">4.9 ★</span>
                            <span class="text-[8px] sm:text-[10px] uppercase tracking-wider text-[#8c7b6c] font-light leading-tight block mt-0.5">Patron Love</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right: High-Fashion Editorial Lookbook Montage -->
                <div class="lg:col-span-5 relative">
                    
                    <!-- Decorative Golden Frame Accent -->
                    <div class="absolute -top-4 -right-4 w-full h-full border border-amber-300/40 rounded-3xl -z-10 hidden sm:block"></div>

                    <!-- Primary Hero Portrait: The Waffle Kimono Robe -->
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-[#ede6dc]">
                        <div class="aspect-4/5 w-full overflow-hidden bg-[#f4eee6]">
                            <img 
                                src="{{ asset('images/products/bathrobe-botanical.jpg') }}" 
                                alt="100% Pure Waffle Cotton Bathrobe" 
                                class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-700"
                            >
                        </div>

                        <!-- Floating Glassmorphic Caption Card -->
                        <div class="absolute bottom-4 inset-x-4 p-4 rounded-2xl bg-white/95 backdrop-blur-md border border-[#ede6dc] shadow-lg flex items-center justify-between">
                            <div>
                                <span class="text-[9px] uppercase tracking-[0.2em] font-semibold text-[#8b3a3a]">Lookbook 01 • Bestseller</span>
                                <h3 class="font-serif text-stone-900 text-sm font-normal">Pure Waffle Kimono Robe</h3>
                                <p class="text-[11px] text-[#8c7b6c] font-light">Botanical Ochre Trim • 100% Cotton</p>
                            </div>
                            <div class="text-right">
                                <span class="font-serif text-sm font-medium text-stone-900">₹2,799</span>
                                <a href="{{ route('shop.product', 'pure-waffle-cotton-bathrobe-botanical-ochre') }}" class="block text-[10px] uppercase tracking-wider font-semibold text-[#8b3a3a] hover:underline mt-0.5">
                                    View Piece →
                                </a>
                            </div>
                        </div>

                        <!-- Floating Circular Artisan Seal -->
                        <div class="absolute top-4 right-4 w-16 h-16 rounded-full bg-[#141210]/90 text-white backdrop-blur-xs flex flex-col items-center justify-center text-center p-1 border border-amber-300/50 shadow-md">
                            <span class="text-[7.5px] uppercase tracking-widest text-amber-200 font-bold leading-tight">JAIPUR</span>
                            <span class="text-[6.5px] tracking-wider text-stone-300">BLOCK</span>
                            <span class="text-[6.5px] tracking-wider text-stone-300">PRINTED</span>
                        </div>
                    </div>

                    <!-- Offset Accent Floating Thumbnail: Quilted Cotton Jacket -->
                    <div class="hidden sm:block absolute -bottom-8 -left-8 w-44 bg-white p-2 rounded-2xl shadow-xl border border-[#ede6dc] transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                        <div class="aspect-square rounded-xl overflow-hidden bg-stone-100 mb-2">
                            <img src="{{ asset('images/products/jacket-quilted-pink.jpg') }}" alt="Quilted Jacket" class="w-full h-full object-cover">
                        </div>
                        <div class="px-1 pb-1">
                            <span class="text-[8px] uppercase tracking-wider text-[#8b3a3a] font-bold">New Release</span>
                            <p class="font-serif text-xs font-normal text-stone-900 truncate">Quilted Cotton Jacket</p>
                            <p class="text-[10px] text-stone-500 font-serif">₹3,499</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- The 13 Handcrafted Expressions (Complete Artisanal Portfolio) -->
    @php
        $artisanEditions = [
            ['name' => 'Bathrobes', 'slug' => 'bathrobes', 'tagline' => 'Pure Waffle & Kimono Robes', 'price' => 'From ₹2,499', 'image' => 'images/products/bathrobe-botanical.jpg'],
            ['name' => 'Sofa Throws', 'slug' => 'sofa-throws', 'tagline' => 'Natural Jute & Cotton', 'price' => 'From ₹1,499', 'image' => 'images/products/throw-natural-jute.jpg'],
            ['name' => 'Towels', 'slug' => 'towels', 'tagline' => 'Honeycomb Bath & Face', 'price' => 'From ₹899', 'image' => 'images/products/towels-pink-floral.jpg'],
            ['name' => 'Table Runners', 'slug' => 'table-runners', 'tagline' => 'Hand Block Printed', 'price' => 'From ₹899', 'image' => 'images/products/table-runner-pink.jpg'],
            ['name' => 'Dohars', 'slug' => 'dohars', 'tagline' => '3-Layer Muslin AC Dohars', 'price' => 'From ₹2,499', 'image' => 'images/products/dohar-cypress.jpg'],
            ['name' => 'Rugs', 'slug' => 'rugs', 'tagline' => 'Handwoven Cotton Dhurries', 'price' => 'From ₹1,899', 'image' => 'images/products/rug-runner-blue.jpg'],
            ['name' => 'Cushion Covers', 'slug' => 'cushion-covers', 'tagline' => 'Quilted Decorative Covers', 'price' => 'From ₹799', 'image' => 'images/products/cushion-marigold.jpg'],
            ['name' => 'Bags', 'slug' => 'bags', 'tagline' => 'Quilted Totes & Duffles', 'price' => 'From ₹1,299', 'image' => 'images/products/tote-set-jungle-emerald.jpg'],
            ['name' => 'Bedsheets', 'slug' => 'bedsheets', 'tagline' => '400TC Hand Block Printed', 'price' => 'From ₹2,199', 'image' => 'images/products/bedsheet-padma-blue.jpg'],
            ['name' => 'Yoga Bags', 'slug' => 'yoga-bags', 'tagline' => 'Quilted Cylinder Slings', 'price' => 'From ₹999', 'image' => 'images/products/yoga-bag-striped-poppy.jpg'],
            ['name' => 'Handbags', 'slug' => 'handbags', 'tagline' => 'Quilted Shoulder Satchels', 'price' => 'From ₹1,199', 'image' => 'images/products/handbag-candy-stripe.jpg'],
            ['name' => 'Table Linen', 'slug' => 'table-linen', 'tagline' => 'Round & Rect Dining Linen', 'price' => 'From ₹1,699', 'image' => 'images/products/table-cover-yellow.jpg'],
            ['name' => 'Comforters', 'slug' => 'comforters', 'tagline' => 'Kantha Razais & Quilts', 'price' => 'From ₹2,999', 'image' => 'images/products/quilt-gulaal-magenta.jpg'],
        ];
    @endphp
    <section class="py-12 sm:py-20 bg-[#FAF7F2] border-t border-[#ede6dc]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6">
                <div>
                    <span class="text-[9.5px] sm:text-[10.5px] uppercase tracking-[0.24em] sm:tracking-[0.28em] text-[#8c7b6c] font-semibold">The Complete Atelier Portfolio</span>
                    <h2 class="font-serif text-2xl sm:text-4xl lg:text-5xl font-normal text-stone-900 mt-1.5 sm:mt-2">The 13 Handcrafted Editions</h2>
                    <div class="w-8 sm:w-10 h-0.5 bg-[#8b3a3a] mt-3 sm:mt-4 mb-2 sm:mb-3"></div>
                    <p class="text-xs sm:text-sm text-stone-500 font-light max-w-2xl leading-relaxed">
                        Every single textile is carved from Sheesham teak, hand-dipped in mineral dyes, and stamped with slow artisan devotion in our Sanganer workshop.
                    </p>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8b3a3a] hover:text-[#a14444] uppercase tracking-[0.16em] transition group">
                        <span>Explore Full Catalog</span>
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>

            <!-- 13 Categories Gallery Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 sm:gap-5">
                @foreach($artisanEditions as $idx => $edition)
                    <a 
                        href="{{ route('shop.category', $edition['slug']) }}" 
                        class="group bg-white rounded-xl sm:rounded-2xl p-2.5 sm:p-3 border border-[#ede6dc] shadow-2xs hover:shadow-xl hover:border-amber-900/30 transition-all duration-300 flex flex-col justify-between"
                    >
                        <div class="relative rounded-lg sm:rounded-xl overflow-hidden aspect-4/5 bg-stone-100 mb-2 sm:mb-3">
                            <img 
                                src="{{ asset($edition['image']) }}" 
                                alt="{{ $edition['name'] }}" 
                                class="w-full h-full object-cover object-center group-hover:scale-108 transition-transform duration-500"
                                loading="lazy"
                            >
                            <!-- Edition Number Badge -->
                            <div class="absolute top-1.5 left-1.5 sm:top-2 sm:left-2 bg-stone-900/80 backdrop-blur-xs text-amber-200 text-[8px] sm:text-[9px] font-semibold px-1.5 sm:px-2 py-0.5 rounded-full uppercase tracking-wider">
                                {{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }} / 13
                            </div>
                        </div>

                        <div class="space-y-0.5 sm:space-y-1">
                            <h3 class="font-serif text-sm sm:text-base font-normal text-stone-900 group-hover:text-amber-950 transition line-clamp-1">
                                {{ $edition['name'] }}
                            </h3>
                            <p class="text-[10px] sm:text-[11px] text-stone-500 font-light line-clamp-1">
                                {{ $edition['tagline'] }}
                            </p>
                            <div class="pt-1 flex items-center justify-between text-xs">
                                <span class="font-serif text-amber-900 font-medium text-[11px] sm:text-xs">{{ $edition['price'] }}</span>
                                <span class="text-[9px] sm:text-[10px] text-stone-400 uppercase tracking-wider group-hover:text-amber-900 group-hover:translate-x-0.5 transition-all">Shop →</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Luxury Craft Ticker Ribbon -->
    <div class="bg-white border-b border-[#ede6dc] py-4 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-center md:justify-between gap-6 text-[10.5px] uppercase tracking-[0.2em] text-[#8c7b6c] font-medium text-center">
                <span class="flex items-center gap-2">
                    <span class="text-amber-700">✦</span> Sanganer Craftmark Certified
                </span>
                <span class="flex items-center gap-2">
                    <span class="text-amber-700">✦</span> 100% Breathable Combed Cotton
                </span>
                <span class="flex items-center gap-2">
                    <span class="text-amber-700">✦</span> Complimentary Express Courier > ₹1,999
                </span>
                <span class="flex items-center gap-2">
                    <span class="text-amber-700">✦</span> WhatsApp Personal Styling Concierge
                </span>
                <span class="flex items-center gap-2">
                    <span class="text-amber-700">✦</span> 7-Day Doorstep Exchange Guarantee
                </span>
            </div>
        </div>
    </div>

    <!-- The Four Sanctuaries (Curated Lifestyle Chapters) -->
    <section class="py-20 bg-[#FAF7F2]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-[10.5px] uppercase tracking-[0.28em] text-[#8c7b6c] font-semibold">Curated Living</span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-stone-900 mt-2">The Four Sanctuaries</h2>
                <div class="w-10 h-0.5 bg-[#8b3a3a] mx-auto mt-4"></div>
                <p class="text-xs sm:text-sm text-stone-500 mt-3 font-light leading-relaxed">
                    Thoughtfully designed textiles that bring quiet elegance and heirloom grace to every room in your home.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Sanctuary 1: The Morning Ritual -->
                <a href="{{ route('shop.category', 'clothing-robes') }}" class="group relative rounded-3xl overflow-hidden aspect-3/4 bg-white border border-[#ede6dc] shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col justify-end p-6">
                    <img 
                        src="{{ asset('images/products/bathrobe-cypress.jpg') }}" 
                        alt="Kimono Bathrobes" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                    <div class="relative z-10 space-y-1.5">
                        <span class="text-[9px] uppercase tracking-[0.24em] font-semibold text-amber-300">Chapter I</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-normal text-white group-hover:text-amber-200 transition">
                            The Morning Ritual
                        </h3>
                        <p class="text-xs text-stone-300 font-light line-clamp-1">Pure Waffle Robes & Quilted Jackets</p>
                        <div class="pt-2 flex items-center justify-between text-xs text-amber-200">
                            <span class="font-serif font-light">From ₹2,499</span>
                            <span class="text-[10px] uppercase tracking-wider font-semibold group-hover:translate-x-1 transition-transform">Explore →</span>
                        </div>
                    </div>
                </a>

                <!-- Sanctuary 2: The Royal Bedchamber -->
                <a href="{{ route('shop.category', 'bedsheets-linen') }}" class="group relative rounded-3xl overflow-hidden aspect-3/4 bg-white border border-[#ede6dc] shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col justify-end p-6">
                    <img 
                        src="{{ asset('images/products/bedsheet-padma-blue.jpg') }}" 
                        alt="Hand Block Bedsheets" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                    <div class="relative z-10 space-y-1.5">
                        <span class="text-[9px] uppercase tracking-[0.24em] font-semibold text-amber-300">Chapter II</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-normal text-white group-hover:text-amber-200 transition">
                            The Royal Bedchamber
                        </h3>
                        <p class="text-xs text-stone-300 font-light line-clamp-1">400TC Hand Block Printed Bedsheets</p>
                        <div class="pt-2 flex items-center justify-between text-xs text-amber-200">
                            <span class="font-serif font-light">From ₹2,199</span>
                            <span class="text-[10px] uppercase tracking-wider font-semibold group-hover:translate-x-1 transition-transform">Explore →</span>
                        </div>
                    </div>
                </a>

                <!-- Sanctuary 3: The Twilight Slumber -->
                <a href="{{ route('shop.category', 'dohars-quilts') }}" class="group relative rounded-3xl overflow-hidden aspect-3/4 bg-white border border-[#ede6dc] shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col justify-end p-6">
                    <img 
                        src="{{ asset('images/products/quilt-gulaal-magenta.jpg') }}" 
                        alt="Reversible Dohars and Quilts" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                    <div class="relative z-10 space-y-1.5">
                        <span class="text-[9px] uppercase tracking-[0.24em] font-semibold text-amber-300">Chapter III</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-normal text-white group-hover:text-amber-200 transition">
                            The Twilight Slumber
                        </h3>
                        <p class="text-xs text-stone-300 font-light line-clamp-1">Triple-Layered Mulmul Dohars & Quilts</p>
                        <div class="pt-2 flex items-center justify-between text-xs text-amber-200">
                            <span class="font-serif font-light">From ₹2,499</span>
                            <span class="text-[10px] uppercase tracking-wider font-semibold group-hover:translate-x-1 transition-transform">Explore →</span>
                        </div>
                    </div>
                </a>

                <!-- Sanctuary 4: The Wanderer's Trunk -->
                <a href="{{ route('shop.category', 'bags-accessories') }}" class="group relative rounded-3xl overflow-hidden aspect-3/4 bg-white border border-[#ede6dc] shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col justify-end p-6">
                    <img 
                        src="{{ asset('images/products/tote-set-jungle-emerald.jpg') }}" 
                        alt="Quilted Travel Totes" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                    <div class="relative z-10 space-y-1.5">
                        <span class="text-[9px] uppercase tracking-[0.24em] font-semibold text-amber-300">Chapter IV</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-normal text-white group-hover:text-amber-200 transition">
                            The Wanderer's Trunk
                        </h3>
                        <p class="text-xs text-stone-300 font-light line-clamp-1">Quilted Weekender Totes & Pouches</p>
                        <div class="pt-2 flex items-center justify-between text-xs text-amber-200">
                            <span class="font-serif font-light">From ₹899</span>
                            <span class="text-[10px] uppercase tracking-wider font-semibold group-hover:translate-x-1 transition-transform">Explore →</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- New Arrivals Gallery ("Fresh From The Blocks") -->
    <section class="py-20 bg-white border-y border-[#ede6dc]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-[10.5px] uppercase tracking-[0.28em] text-[#8c7b6c] font-semibold">Latest Impressions</span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-stone-900 mt-2">Fresh from the Blocks</h2>
                    <p class="text-xs sm:text-sm text-stone-500 mt-2 font-light">Limited small-batch creations stamped with natural mineral and vegetable dyes.</p>
                </div>
                <a href="{{ route('shop.index', ['sort' => 'newest']) }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8b3a3a] hover:text-[#a14444] uppercase tracking-[0.16em] transition group">
                    <span>View All New Releases</span>
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-7">
                @foreach($newArrivals as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- The Master Artisan's Workshop (Heritage Story Feature) -->
    <section class="py-24 bg-[#FAF7F2] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left: Photographic Artisan Montage -->
                <div class="lg:col-span-6 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-[#ede6dc]">
                        <img 
                            src="{{ asset('images/products/quilt-pink-gold-block.jpg') }}" 
                            alt="Jaipur Block Printing" 
                            class="w-full aspect-4/3 object-cover object-center"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent flex flex-col justify-end p-8 text-white">
                            <span class="text-[10px] uppercase tracking-[0.25em] text-amber-300 font-medium">Sanganer, Rajasthan</span>
                            <h4 class="font-serif text-2xl font-normal text-stone-100 mt-1">The Living Legacy of Block Carving</h4>
                        </div>
                    </div>

                    <!-- Floating Quote Box -->
                    <div class="hidden sm:block absolute -bottom-8 -right-6 max-w-xs bg-white p-6 rounded-2xl shadow-xl border border-[#ede6dc]">
                        <p class="font-serif italic text-xs text-stone-700 leading-relaxed">
                            "A single bedsheet takes up to 1,200 deliberate stamps of a wooden block. We preserve the quiet rhythm of human hands over mechanical speed."
                        </p>
                        <p class="text-[9px] uppercase tracking-widest text-[#8c7b6c] font-semibold mt-3">— Master Ramji Lal, 3rd Generation Carver</p>
                    </div>
                </div>

                <!-- Right: The 5 Rhythms of Handcraft -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-[10.5px] uppercase tracking-[0.28em] text-[#8c7b6c] font-semibold">Artisan Devotion</span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-stone-900 leading-tight">
                        The Rhythm of Teak, Dyes, and River Sun
                    </h2>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
                        Unlike chemical roller printing, our textiles are born through time. Each motif begins as an intricate sketch, is hand-chiseled into Sheesham wood blocks, and applied one rhythmic stamp at a time.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 bg-white rounded-2xl border border-[#ede6dc]">
                            <span class="font-serif text-amber-900 font-bold text-sm block">I. Teak Block Carving</span>
                            <p class="text-[11px] text-stone-500 font-light mt-1">Seasoned wood chiseled to microscopic precision by master artisans.</p>
                        </div>
                        <div class="p-4 bg-white rounded-2xl border border-[#ede6dc]">
                            <span class="font-serif text-amber-900 font-bold text-sm block">II. Botanical Pigments</span>
                            <p class="text-[11px] text-stone-500 font-light mt-1">Azo-free mineral and natural herbal extracts gentle on sensitive skin.</p>
                        </div>
                        <div class="p-4 bg-white rounded-2xl border border-[#ede6dc]">
                            <span class="font-serif text-amber-900 font-bold text-sm block">III. Rhythmic Stamping</span>
                            <p class="text-[11px] text-stone-500 font-light mt-1">Layered multi-block registration aligned solely by human eye and touch.</p>
                        </div>
                        <div class="p-4 bg-white rounded-2xl border border-[#ede6dc]">
                            <span class="font-serif text-amber-900 font-bold text-sm block">IV. Sun Drying & Wash</span>
                            <p class="text-[11px] text-stone-500 font-light mt-1">Cured under the warm desert sunshine and washed in flowing open water.</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('craft') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8b3a3a] hover:text-[#a14444] uppercase tracking-[0.16em] transition group">
                            <span>Step Inside The Full Craft Process</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Curated Spotlight: Gulaal Ghar & Padma Bloom -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Gulaal Ghar Collection Banner -->
            <div class="relative rounded-3xl overflow-hidden bg-[#141210] text-[#FAF7F2] shadow-2xl border border-amber-900/30">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                    <div class="lg:col-span-6 p-8 sm:p-14 space-y-5">
                        <span class="text-[10px] uppercase font-bold tracking-[0.25em] text-amber-300">Festive Kantha Edition</span>
                        <h3 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal leading-tight text-white">
                            Gulaal Ghar Collection
                        </h3>
                        <p class="text-xs sm:text-sm text-stone-300 leading-relaxed font-light">
                            Let your home bloom in the joyous hues of Raatrani. Hand-quilted by master women artisans with micro-kantha stitches on butter-soft mulmul cotton. Reversible, featherlight, and exquisitely warm.
                        </p>
                        <div class="pt-3 flex flex-wrap gap-4">
                            <a href="{{ route('shop.collection', 'gulaal-ghar-collection') }}" class="px-7 py-3.5 bg-amber-600 hover:bg-amber-500 text-white rounded-full text-xs font-semibold uppercase tracking-[0.16em] transition shadow-md">
                                Shop Gulaal Ghar
                            </a>
                            <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! Please share more photos of the Gulaal Ghar festive quilts.') }}" target="_blank" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 text-white rounded-full text-xs font-semibold uppercase tracking-[0.16em] transition border border-white/20">
                                WhatsApp Inquiry
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-6 grid grid-cols-2 gap-3 p-5 bg-[#1b1715]">
                        <img src="{{ asset('images/products/quilt-gulaal-magenta.jpg') }}" alt="Gulaal Magenta" class="w-full aspect-4/5 object-cover rounded-2xl shadow-sm">
                        <img src="{{ asset('images/products/quilt-gulaal-yellow.jpg') }}" alt="Gulaal Yellow" class="w-full aspect-4/5 object-cover rounded-2xl shadow-sm">
                    </div>
                </div>
            </div>

            <!-- Padma Bloom & Jungle Haven Dual Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Padma Bloom Card -->
                <div class="relative rounded-3xl overflow-hidden bg-[#FAF7F2] border border-[#ede6dc] p-8 group">
                    <div class="aspect-16/10 rounded-2xl overflow-hidden bg-stone-100 mb-6 shadow-sm">
                        <img src="{{ asset('images/products/bedsheet-padma-blue.jpg') }}" alt="Padma Bloom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#8b3a3a]">Slow Botanical Bedding</span>
                    <h4 class="font-serif text-2xl sm:text-3xl font-normal text-stone-900 mt-1">Padma Bloom Collection</h4>
                    <p class="text-xs sm:text-sm text-stone-600 mt-2 leading-relaxed font-light">
                        Rooted in earth, blooming in grace. Each thread tells the tale of Jaipur block carvers who aligned five separate wood blocks to stamp this opulent floral sanctuary.
                    </p>
                    <a href="{{ route('shop.collection', 'padma-bloom-collection') }}" class="inline-block mt-4 text-xs font-semibold text-stone-900 group-hover:text-[#8b3a3a] uppercase tracking-wider">
                        Explore Padma Bloom →
                    </a>
                </div>

                <!-- Jungle Haven Totes Card -->
                <div class="relative rounded-3xl overflow-hidden bg-[#FAF7F2] border border-[#ede6dc] p-8 group">
                    <div class="aspect-16/10 rounded-2xl overflow-hidden bg-stone-100 mb-6 shadow-sm">
                        <img src="{{ asset('images/products/tote-set-jungle-emerald.jpg') }}" alt="Jungle Haven" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#8b3a3a]">4-Piece Travel Organizers</span>
                    <h4 class="font-serif text-2xl sm:text-3xl font-normal text-stone-900 mt-1">Jungle Haven Quilted Sets</h4>
                    <p class="text-xs sm:text-sm text-stone-600 mt-2 leading-relaxed font-light">
                        One spacious quilted tote bag plus three nested utility pouches. Hand-blocked with majestic palms and wildlife motifs on 100% heavy organic canvas.
                    </p>
                    <a href="{{ route('shop.collection', 'jungle-haven') }}" class="inline-block mt-4 text-xs font-semibold text-stone-900 group-hover:text-[#8b3a3a] uppercase tracking-wider">
                        Explore Tote Sets →
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Customer Bestsellers Section -->
    <section class="py-20 bg-[#FAF7F2] border-y border-[#ede6dc]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-[10.5px] uppercase tracking-[0.28em] text-[#8c7b6c] font-semibold">Treasured Favorites</span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-stone-900 mt-2">Most Cherished Essentials</h2>
                    <p class="text-xs sm:text-sm text-stone-500 mt-2 font-light">The handcrafted icons our patrons return to time and again.</p>
                </div>
                <a href="{{ route('shop.index', ['sort' => 'bestselling']) }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8b3a3a] hover:text-[#a14444] uppercase tracking-[0.16em] transition group">
                    <span>View All Bestsellers</span>
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-7">
                @foreach($bestsellers as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bespoke Gifting & Trousseau Service Banner -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-r from-[#201c19] to-[#141210] p-8 sm:p-14 border border-amber-300/30 text-white">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <span class="text-[10px] uppercase font-bold tracking-[0.28em] text-amber-300">Bespoke Wedding & Corporate Gifting</span>
                        <h3 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-white leading-tight">
                            Heirloom Hampers for Your Most Cherished Celebrations
                        </h3>
                        <p class="text-xs sm:text-sm text-stone-300 leading-relaxed font-light max-w-2xl">
                            From royal wedding trousseaus to festive Diwali gift boxes, we curate bespoke hampers wrapped in hand-block printed cotton ribbons with brass bells and personalized calligraphy cards.
                        </p>
                    </div>
                    <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-end">
                        <a href="{{ route('gifting') }}" class="px-7 py-3.5 bg-amber-600 hover:bg-amber-500 text-white rounded-full text-xs font-semibold uppercase tracking-[0.18em] text-center transition shadow-md">
                            Explore Gifting Catalog
                        </a>
                        <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to inquire about customized gift hampers.') }}" target="_blank" class="px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white rounded-full text-xs font-semibold uppercase tracking-[0.18em] text-center transition border border-white/20">
                            Speak to Gifting Specialist
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Words of Love / Patron Testimonials -->
    <section class="py-20 bg-[#FAF7F2] border-t border-[#ede6dc]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-14">
                <span class="text-[10.5px] uppercase tracking-[0.28em] text-[#8c7b6c] font-semibold">Patron Voices</span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-stone-900 mt-2">From Our Sanctuaries</h2>
                <div class="w-10 h-0.5 bg-[#8b3a3a] mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $rev)
                    <div class="bg-white p-7 rounded-3xl border border-[#ede6dc] shadow-2xs flex flex-col justify-between">
                        <div>
                            <div class="flex text-amber-500 mb-4">
                                @for($i = 1; $i <= $rev->rating; $i++)
                                    <svg class="w-4 h-4 fill-amber-400" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="font-serif italic text-sm text-stone-800 leading-relaxed mb-6 font-normal">"{{ $rev->comment }}"</p>
                        </div>
                        <div class="pt-4 border-t border-[#ede6dc]/80 flex items-center justify-between">
                            <div>
                                <p class="font-serif font-bold text-stone-900 text-sm">{{ $rev->customer_name }}</p>
                                <p class="text-[10px] text-[#8c7b6c] uppercase tracking-wider font-light">{{ $rev->customer_city ?? 'Verified Patron' }}</p>
                            </div>
                            @if($rev->product)
                                <span class="text-[10px] text-[#8b3a3a] font-medium truncate max-w-[120px]">{{ $rev->product->name }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Instagram Gallery Section (Mirrors @the_raatrani) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between mb-10 gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-6 h-6 rounded-full border border-amber-300">
                        <span class="text-[10.5px] uppercase tracking-[0.25em] text-[#8c7b6c] font-semibold">@the_raatrani on Instagram</span>
                    </div>
                    <h2 class="font-serif text-3xl font-normal text-stone-900 mt-1">Living the Handcrafted Story</h2>
                </div>
                <a href="https://instagram.com/the_raatrani" target="_blank" class="px-6 py-2.5 bg-[#FAF7F2] hover:bg-[#ede6dc] text-stone-800 rounded-full text-xs font-medium uppercase tracking-[0.16em] transition border border-[#ede6dc]">
                    Follow On Instagram →
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                @php
                    $instaImages = [
                        'jacket-quilted-pink.jpg',
                        'bathrobe-botanical.jpg',
                        'bedsheet-padma-blue.jpg',
                        'quilt-gulaal-magenta.jpg',
                        'tote-set-jungle-emerald.jpg',
                        'bathrobe-poolside.jpg',
                    ];
                @endphp
                @foreach($instaImages as $img)
                    <a href="https://instagram.com/the_raatrani" target="_blank" class="group relative rounded-2xl overflow-hidden aspect-square bg-stone-100 border border-[#ede6dc] shadow-2xs">
                        <img 
                            src="{{ asset('images/products/' . $img) }}" 
                            alt="Raatrani Living" 
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-[#141210]/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white text-xs font-serif tracking-widest uppercase">@the_raatrani</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
