<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Raatrani | Atelier Jaipur • Handcrafted Luxury & Living' }}</title>
    <meta name="description" content="Raatrani brings Jaipur's timeless hand block printing to life. 100% pure cotton bathrobes, quilts, bedsheets, diwan sets, rugs, and quilted bags crafted with slow artisan devotion.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF7F2] text-[#2c2623] flex flex-col min-h-full font-sans antialiased selection:bg-amber-100 selection:text-amber-900">

    <!-- Top Luxury Announcement Ribbon -->
    <div class="bg-[#141210] text-[#e8ded3] text-[10.5px] tracking-[0.16em] uppercase py-2.5 px-4 border-b border-[#28221d]">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="hidden xl:flex items-center gap-4 text-stone-400 font-light">
                <span class="flex items-center gap-1.5">
                    <span class="text-amber-300">✦</span> ATELIER JAIPUR
                </span>
                <span class="text-stone-700">•</span>
                <span>HAND-CARVED TEAK BLOCKS</span>
                <span class="text-stone-700">•</span>
                <span>100% PURE COMBED COTTON</span>
            </div>
            
            <div class="mx-auto xl:mx-0 text-center font-normal tracking-widest text-[#f0eae1]">
                <span>COMPLIMENTARY EXPRESS SHIPPING OVER <strong class="text-amber-300 font-semibold">₹1,999</strong> • USE CODE <strong class="text-amber-300 font-bold tracking-widest">RAATRANI10</strong> FOR 10% OFF</span>
            </div>

            <div class="hidden md:flex items-center gap-4 text-stone-300 text-[10px]">
                <a href="https://wa.me/918946966292" target="_blank" class="hover:text-amber-300 transition flex items-center gap-1.5 font-light tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>CONCIERGE: +91 8946966292</span>
                </a>
                <span class="text-stone-700">|</span>
                <a href="{{ route('order.track.index') }}" class="hover:text-amber-300 transition font-light tracking-wider">TRACK ORDER</a>
            </div>
        </div>
    </div>

    <!-- Centerpiece Brand Header (Tier 2) -->
    <header class="bg-[#FAF7F2] border-b border-[#ede6dc]/80 relative z-30">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-3.5 sm:py-5">
            <div class="flex items-center justify-between gap-2 sm:gap-4">
                
                <!-- Left: Search & Mobile Navigation Trigger -->
                <div class="flex items-center gap-1 sm:gap-2 shrink-0">
                    <!-- Mobile Hamburger Button -->
                    <button type="button" onclick="openMobileMenu()" class="p-1.5 text-stone-800 hover:text-amber-900 transition lg:hidden" aria-label="Open Mobile Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Mobile Search Trigger -->
                    <button type="button" onclick="openSearchModal()" class="p-1.5 text-stone-800 hover:text-amber-900 transition lg:hidden" aria-label="Search Catalog">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- Desktop Search Bar -->
                    <button type="button" onclick="openSearchModal()" class="hidden lg:flex items-center gap-3 text-stone-500 hover:text-stone-900 bg-white/90 hover:bg-white px-4 py-2 rounded-full text-xs transition cursor-pointer border border-[#e2d9cd] shadow-2xs group w-64 xl:w-72">
                        <svg class="w-3.5 h-3.5 text-stone-400 group-hover:text-amber-900 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="font-light tracking-wider text-stone-400 text-[11px] uppercase">Search prints, robes...</span>
                    </button>
                </div>

                <!-- Center: The RAATRANI Royal Wordmark & Insignia -->
                <div class="flex flex-col items-center justify-center text-center px-1 shrink min-w-0">
                    <a href="{{ route('home') }}" class="group flex flex-col items-center">
                        <div class="flex items-center gap-1.5 sm:gap-2.5">
                            <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani Emblem" class="w-7 h-7 sm:w-10 sm:h-10 rounded-full border border-amber-300/70 shadow-2xs group-hover:scale-105 transition-transform shrink-0">
                            <span class="font-serif text-base sm:text-2xl md:text-3xl lg:text-4xl font-normal tracking-[0.15em] sm:tracking-[0.24em] text-stone-900 group-hover:text-amber-950 transition whitespace-nowrap">RAATRANI</span>
                        </div>
                        <span class="text-[7px] sm:text-[9px] uppercase tracking-[0.16em] sm:tracking-[0.34em] text-[#8c7b6c] font-medium mt-0.5 whitespace-nowrap">
                            <span class="sm:hidden">JAIPUR ATELIER</span>
                            <span class="hidden sm:inline">JAIPUR • HANDCRAFTED ATELIER</span>
                        </span>
                    </a>
                </div>

                <!-- Right: Luxury Utilities -->
                <div class="flex items-center justify-end gap-1.5 sm:gap-4 shrink-0">
                    <!-- Luxury Currency / Region Selector -->
                    <div class="relative group py-2 hidden md:block">
                        <button type="button" class="text-[10.5px] tracking-[0.16em] uppercase font-medium text-[#8c7b6c] hover:text-stone-900 transition flex items-center gap-1 cursor-pointer">
                            <span id="active-currency-label">🇮🇳 INR (₹)</span>
                            <svg class="w-3 h-3 text-stone-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute right-0 top-full w-40 bg-white rounded-xl shadow-xl border border-stone-200 py-1.5 hidden group-hover:block transition-all z-50 text-xs">
                            <button type="button" onclick="setCurrency('INR', '₹', '🇮🇳 INR (₹)')" class="w-full text-left px-3.5 py-1.5 hover:bg-[#FAF7F2] text-stone-700 flex items-center justify-between cursor-pointer">
                                <span>🇮🇳 India</span>
                                <span class="font-semibold text-stone-900">INR (₹)</span>
                            </button>
                            <button type="button" onclick="setCurrency('USD', '$', '🇺🇸 USD ($)')" class="w-full text-left px-3.5 py-1.5 hover:bg-[#FAF7F2] text-stone-700 flex items-center justify-between cursor-pointer">
                                <span>🇺🇸 USA</span>
                                <span class="font-semibold text-stone-900">USD ($)</span>
                            </button>
                            <button type="button" onclick="setCurrency('GBP', '£', '🇬🇧 GBP (£)')" class="w-full text-left px-3.5 py-1.5 hover:bg-[#FAF7F2] text-stone-700 flex items-center justify-between cursor-pointer">
                                <span>🇬🇧 UK</span>
                                <span class="font-semibold text-stone-900">GBP (£)</span>
                            </button>
                            <button type="button" onclick="setCurrency('EUR', '€', '🇪🇺 EUR (€)')" class="w-full text-left px-3.5 py-1.5 hover:bg-[#FAF7F2] text-stone-700 flex items-center justify-between cursor-pointer">
                                <span>🇪🇺 Europe</span>
                                <span class="font-semibold text-stone-900">EUR (€)</span>
                            </button>
                            <button type="button" onclick="setCurrency('AED', 'AED ', '🇦🇪 AED (د.إ)')" class="w-full text-left px-3.5 py-1.5 hover:bg-[#FAF7F2] text-stone-700 flex items-center justify-between cursor-pointer">
                                <span>🇦🇪 UAE</span>
                                <span class="font-semibold text-stone-900">AED</span>
                            </button>
                        </div>
                    </div>

                    <!-- Wishlist Link -->
                    <a href="{{ route('wishlist.index') }}" class="hidden sm:inline-flex relative p-1.5 sm:p-2 text-stone-700 hover:text-amber-950 transition" title="Curated Wishlist">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span id="wishlist-badge" class="absolute top-0.5 right-0.5 bg-[#8b3a3a] text-white text-[8px] sm:text-[9px] font-bold w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full flex items-center justify-center {{ $wishlistCount > 0 ? '' : 'hidden' }}">
                            {{ $wishlistCount }}
                        </span>
                    </a>

                    <!-- Account / Admin Link -->
                    @auth
                        <div class="relative group py-2">
                            <button class="p-1.5 sm:p-2 text-stone-700 hover:text-amber-950 transition flex items-center gap-1 cursor-pointer">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </button>
                            <div class="absolute right-0 top-full w-52 bg-white rounded-2xl shadow-xl border border-stone-200 py-2 hidden group-hover:block transition-all z-50">
                                <div class="px-4 py-2.5 border-b border-stone-100 text-xs">
                                    <p class="font-serif font-bold text-stone-900 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] text-stone-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                @if(Auth::user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xs text-amber-900 font-semibold hover:bg-[#FAF7F2]">
                                        Admin Management
                                    </a>
                                @endif
                                <a href="{{ route('account.dashboard') }}" class="block px-4 py-2 text-xs text-stone-700 hover:bg-[#FAF7F2]">
                                    My Orders & Profile
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs text-rose-700 hover:bg-[#FAF7F2] cursor-pointer">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="p-1.5 sm:p-2 text-stone-700 hover:text-amber-950 transition" title="Client Sign In">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </a>
                    @endauth

                    <!-- Luxury Bag Drawer Trigger -->
                    <button type="button" onclick="openCartDrawer()" class="flex items-center gap-1 sm:gap-2 bg-[#141210] hover:bg-[#2c2623] text-[#FAF7F2] px-2.5 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs tracking-wider uppercase font-medium transition-all duration-300 shadow-2xs cursor-pointer shrink-0">
                        <svg class="w-3.5 h-3.5 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="text-[10px] sm:text-[11px] tracking-[0.14em] hidden sm:inline">BAG</span>
                        <span id="header-cart-count" class="bg-amber-900/90 text-amber-200 text-[9.5px] sm:text-[10px] px-1.5 py-0.2 rounded-full font-bold">{{ $cartItemCount }}</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Dedicated Grand Navigation Ribbon (Tier 3) -->
    <nav class="hidden lg:block sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-[#ede6dc] shadow-2xs transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-center gap-7 xl:gap-8 py-3.5 text-[11px] font-medium tracking-[0.16em] uppercase text-stone-700">
            <a href="{{ route('shop.index') }}" class="hover:text-amber-950 transition relative py-1 group {{ request()->routeIs('shop.index') && !request()->route('category') ? 'text-amber-950 font-semibold' : '' }}">
                <span>ALL EDITIONS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            
            <!-- Categories Dropdown (Featuring all 13 Handcrafted Products) -->
            <div class="relative group py-1">
                <button class="flex items-center gap-1 hover:text-amber-950 transition cursor-pointer">
                    <span>CATEGORIES</span>
                    <svg class="w-3 h-3 text-stone-400 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute top-full left-1/2 -translate-x-1/2 w-[460px] bg-white rounded-2xl shadow-2xl border border-stone-200 p-5 hidden group-hover:block transition-all z-50 mt-2">
                    <div class="text-[10px] uppercase tracking-[0.2em] font-semibold text-[#8c7b6c] mb-3 pb-2 border-b border-[#ede6dc]">
                        Artisanal Product Lines
                    </div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-xs normal-case tracking-normal">
                        <a href="{{ route('shop.category', 'bathrobes') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Bathrobes</span>
                            <span class="text-[10px] text-stone-400">Pure Waffle</span>
                        </a>
                        <a href="{{ route('shop.category', 'sofa-throws') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Sofa Throws</span>
                            <span class="text-[10px] text-stone-400">Jute & Cotton</span>
                        </a>
                        <a href="{{ route('shop.category', 'towels') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Towels</span>
                            <span class="text-[10px] text-stone-400">Bath & Face</span>
                        </a>
                        <a href="{{ route('shop.category', 'table-runners') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Table Runners</span>
                            <span class="text-[10px] text-stone-400">Block Printed</span>
                        </a>
                        <a href="{{ route('shop.category', 'dohars') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Dohars</span>
                            <span class="text-[10px] text-stone-400">3-Layer Muslin</span>
                        </a>
                        <a href="{{ route('shop.category', 'rugs') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Rugs</span>
                            <span class="text-[10px] text-stone-400">Cotton Dhurries</span>
                        </a>
                        <a href="{{ route('shop.category', 'cushion-covers') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Cushion Covers</span>
                            <span class="text-[10px] text-stone-400">16x16 & 20x20</span>
                        </a>
                        <a href="{{ route('shop.category', 'bags') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Bags</span>
                            <span class="text-[10px] text-stone-400">Totes & Duffles</span>
                        </a>
                        <a href="{{ route('shop.category', 'bedsheets') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Bedsheets</span>
                            <span class="text-[10px] text-stone-400">Double & King</span>
                        </a>
                        <a href="{{ route('shop.category', 'yoga-bags') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Yoga Bags</span>
                            <span class="text-[10px] text-stone-400">Cylinder Carriers</span>
                        </a>
                        <a href="{{ route('shop.category', 'handbags') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Handbags</span>
                            <span class="text-[10px] text-stone-400">Quilted Shoulder</span>
                        </a>
                        <a href="{{ route('shop.category', 'table-linen') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Table Linen</span>
                            <span class="text-[10px] text-stone-400">Round & Rect</span>
                        </a>
                        <a href="{{ route('shop.category', 'comforters') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg hover:bg-[#FAF7F2] hover:text-amber-950 text-stone-700 transition">
                            <span class="font-medium">Comforters & Quilts</span>
                            <span class="text-[10px] text-stone-400">Festive Razais</span>
                        </a>
                        <a href="{{ route('shop.index') }}" class="flex items-center justify-between py-1.5 px-2.5 rounded-lg bg-amber-50 text-amber-900 font-semibold transition">
                            <span>Browse All 13 Categories</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('shop.category', 'bathrobes') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>BATHROBES</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'bedsheets') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>BEDSHEETS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'dohars') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>DOHARS & COMFORTERS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'cushion-covers') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>THROWS & CUSHIONS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'table-linen') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>TABLE LINEN & RUNNERS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'towels') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>TOWELS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'rugs') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>RUGS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('shop.category', 'bags') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>BAGS</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('craft') }}" class="hover:text-amber-950 transition relative py-1 group">
                <span>THE ATELIER</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ route('gifting') }}" class="text-[#8b3a3a] hover:text-amber-950 font-semibold transition relative py-1 group flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-[#8b3a3a]"></span>
                <span>BESPOKE GIFTING</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-900 group-hover:w-full transition-all duration-300"></span>
            </a>
        </div>
    </nav>

    <!-- Global Toast Alert Container -->
    <div id="toast-container" class="fixed top-24 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- Flash Session Messages -->
    @if(session('success'))
        <div id="flash-success" class="max-w-7xl mx-auto px-4 mt-3">
            <div class="flex items-center justify-between p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-xl text-sm">
                <div class="flex items-center gap-2.5">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="document.getElementById('flash-success').remove()" class="text-emerald-700 hover:text-emerald-900">✕</button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="flash-error" class="max-w-7xl mx-auto px-4 mt-3">
            <div class="flex items-center justify-between p-3.5 bg-rose-50 border border-rose-200 text-rose-900 rounded-xl text-sm">
                <div class="flex items-center gap-2.5">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="document.getElementById('flash-error').remove()" class="text-rose-700 hover:text-rose-900">✕</button>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Slide-over Cart Drawer -->
    <div id="cart-drawer-backdrop" onclick="closeCartDrawer()" class="fixed inset-0 bg-stone-900/60 backdrop-blur-xs z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>
    <div id="cart-drawer-panel" class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-[#ede6dc]">
            <div class="flex items-center gap-2.5">
                <h3 class="font-serif text-xl font-normal text-stone-900">Your Shopping Bag</h3>
                <span id="drawer-item-count" class="text-[10px] tracking-wider uppercase bg-[#FAF7F2] text-amber-900 font-bold px-2 py-0.5 rounded-full border border-amber-200/80">
                    {{ $cartItemCount }}
                </span>
            </div>
            <button type="button" onclick="closeCartDrawer()" class="p-1.5 text-stone-400 hover:text-stone-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Drawer Content Body -->
        <div id="cart-drawer-container" class="flex-1 overflow-hidden">
            @include('components.cart-drawer-content', [
                'items' => app(\App\Services\CartService::class)->getItems(),
                'subtotal' => app(\App\Services\CartService::class)->getSubtotal(),
                'discount' => app(\App\Services\CartService::class)->getDiscount(),
                'shipping' => app(\App\Services\CartService::class)->getShippingFee(),
                'grandTotal' => app(\App\Services\CartService::class)->getGrandTotal(),
                'freeShippingRemaining' => app(\App\Services\CartService::class)->getFreeShippingRemaining(),
                'freeShippingProgress' => app(\App\Services\CartService::class)->getFreeShippingProgress(),
                'coupon' => app(\App\Services\CartService::class)->getCoupon(),
            ])
        </div>
    </div>

    <!-- Search Modal Overlay -->
    <div id="search-modal" class="fixed inset-0 bg-stone-950/70 backdrop-blur-sm z-50 hidden items-start justify-center pt-20 px-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden border border-[#ede6dc]" onclick="event.stopPropagation()">
            <div class="p-5 border-b border-[#ede6dc] flex items-center gap-3">
                <svg class="w-5 h-5 text-stone-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <form action="{{ route('shop.index') }}" method="GET" class="flex-1">
                    <input 
                        type="text" 
                        name="q" 
                        id="search-modal-input" 
                        placeholder="Search hand block prints, waffle robes, quilts, tote bags..." 
                        class="w-full text-stone-900 placeholder-stone-400 text-sm focus:outline-none font-light"
                    >
                </form>
                <button type="button" onclick="closeSearchModal()" class="text-stone-400 hover:text-stone-700 text-xs uppercase font-medium tracking-wider">
                    ESC
                </button>
            </div>
            <div class="p-5 bg-[#FAF7F2]">
                <p class="text-[10px] uppercase tracking-[0.2em] text-[#8c7b6c] font-semibold mb-3">Popular Product Searches</p>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('shop.category', 'bathrobes') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Bathrobes</a>
                    <a href="{{ route('shop.category', 'sofa-throws') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Sofa Throws</a>
                    <a href="{{ route('shop.category', 'towels') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Towels</a>
                    <a href="{{ route('shop.category', 'table-runners') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Table Runners</a>
                    <a href="{{ route('shop.category', 'dohars') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Dohars</a>
                    <a href="{{ route('shop.category', 'rugs') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Rugs</a>
                    <a href="{{ route('shop.category', 'cushion-covers') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Cushion Covers</a>
                    <a href="{{ route('shop.category', 'bags') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Bags</a>
                    <a href="{{ route('shop.category', 'bedsheets') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Bedsheets</a>
                    <a href="{{ route('shop.category', 'yoga-bags') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Yoga Bags</a>
                    <a href="{{ route('shop.category', 'handbags') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Handbags</a>
                    <a href="{{ route('shop.category', 'table-linen') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Table Linen</a>
                    <a href="{{ route('shop.category', 'comforters') }}" class="text-xs bg-white hover:bg-[#141210] hover:text-[#FAF7F2] text-stone-700 border border-[#ede6dc] px-3.5 py-1.5 rounded-full transition shadow-2xs">Comforters</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="fixed inset-0 bg-stone-950/70 backdrop-blur-xs z-50 hidden">
        <div class="fixed inset-y-0 left-0 w-4/5 max-w-sm bg-[#FAF7F2] shadow-2xl flex flex-col p-6 overflow-y-auto">
            <div class="flex items-center justify-between pb-5 border-b border-[#ede6dc]">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-10 h-10 rounded-full border border-amber-300">
                    <div class="flex flex-col">
                        <span class="font-serif text-xl font-normal tracking-[0.2em] text-stone-900">RAATRANI</span>
                        <span class="text-[8px] uppercase tracking-widest text-[#8c7b6c]">JAIPUR ATELIER</span>
                    </div>
                </div>
                <button type="button" onclick="closeMobileMenu()" class="p-1 text-stone-400 hover:text-stone-700">✕</button>
            </div>

            <div class="flex items-center gap-2 py-3 border-b border-[#ede6dc]">
                <a href="{{ route('wishlist.index') }}" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-white rounded-xl border border-[#ede6dc] text-[11px] font-medium text-stone-700 hover:text-amber-950 shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-[#8b3a3a]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span>Wishlist ({{ $wishlistCount }})</span>
                </a>
                @auth
                    <a href="{{ route('account.dashboard') }}" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-white rounded-xl border border-[#ede6dc] text-[11px] font-medium text-stone-700 hover:text-amber-950 shadow-2xs">
                        <span>My Account</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-white rounded-xl border border-[#ede6dc] text-[11px] font-medium text-stone-700 hover:text-amber-950 shadow-2xs">
                        <span>Sign In</span>
                    </a>
                @endauth
            </div>

            <nav class="py-4 space-y-3 text-xs tracking-wider uppercase font-medium text-stone-800">
                <a href="{{ route('home') }}" class="block py-1 hover:text-amber-950">Home</a>
                <a href="{{ route('shop.index') }}" class="block py-1 text-amber-950 font-bold">All Collections</a>
                
                <div class="pt-2 border-t border-[#ede6dc] space-y-2">
                    <p class="text-[9.5px] uppercase font-bold tracking-[0.2em] text-[#8c7b6c]">Categories</p>
                    <div class="space-y-1.5 pl-2">
                        @foreach($navCategories as $cat)
                            <a href="{{ route('shop.category', $cat->slug) }}" class="block text-[11px] normal-case text-stone-600 hover:text-amber-950">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="pt-2 border-t border-[#ede6dc] space-y-2.5">
                    <a href="{{ route('craft') }}" class="block hover:text-amber-950">The Jaipur Atelier</a>
                    <a href="{{ route('about') }}" class="block hover:text-amber-950">Our Heritage & Story</a>
                    <a href="{{ route('gifting') }}" class="block text-[#8b3a3a] font-semibold">Bespoke Wedding & Gifting</a>
                    <a href="{{ route('contact') }}" class="block hover:text-amber-950">Contact & Studio</a>
                    <a href="{{ route('order.track.index') }}" class="block hover:text-amber-950">Track Your Order</a>
                </div>
            </nav>

            <div class="mt-auto pt-6 border-t border-[#ede6dc] space-y-3">
                <a href="https://wa.me/918946966292" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-[#141210] text-[#FAF7F2] rounded-xl text-xs uppercase tracking-wider font-medium">
                    <span>WhatsApp Concierge (+91 8946966292)</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp Concierge Widget -->
    <a 
        href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to inquire about your handcrafted collections.') }}" 
        target="_blank" 
        class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-40 bg-[#141210] hover:bg-[#2c2623] text-white p-3 sm:p-3.5 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 flex items-center justify-center group border border-amber-300/40"
        title="WhatsApp Concierge"
    >
        <svg class="w-5 h-5 fill-emerald-400" viewBox="0 0 24 24">
            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.585 1.776.84 2.802.84 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.774-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs group-hover:ml-2 text-xs uppercase tracking-widest font-medium text-amber-200 transition-all duration-300">
            Concierge
        </span>
    </a>

    <!-- Luxury Footer -->
    <footer class="bg-[#141210] text-[#e8ded3] pt-20 pb-12 border-t border-[#28221d]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 pb-16 border-b border-[#28221d]">
                
                <!-- Brand Bio & Contact -->
                <div class="lg:col-span-2 space-y-5">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-12 h-12 rounded-full border border-amber-300/40">
                        <div>
                            <span class="font-serif text-2xl font-normal tracking-[0.24em] text-white">RAATRANI</span>
                            <p class="text-[9px] text-[#c98a4b] tracking-[0.3em] uppercase">Atelier Jaipur • Est. 2026</p>
                        </div>
                    </div>
                    <p class="text-xs text-stone-400 leading-relaxed max-w-sm font-light">
                        Honouring the sacred craft of Jaipur hand block printing. Every bedsheet, mulmul quilt, pure waffle robe, and home accent is hand-stamped with seasoned teak wood blocks and washed in natural waters with slow devotion.
                    </p>
                    <div class="pt-2 text-xs space-y-2 text-stone-300 font-light">
                        <p class="flex items-center gap-2">
                            <span class="text-[#c98a4b]">Concierge Desk:</span>
                            <a href="https://wa.me/918946966292" target="_blank" class="hover:text-amber-300 underline font-normal">+91 8946966292</a>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-[#c98a4b]">Instagram:</span>
                            <a href="https://instagram.com/the_raatrani" target="_blank" class="hover:text-amber-300 underline font-normal">@the_raatrani</a>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-[#c98a4b]">Atelier Studio:</span>
                            <span>Heritage Crafts Enclave, Jaipur, Rajasthan 302002</span>
                        </p>
                    </div>
                </div>

                <!-- Shop Links -->
                <div>
                    <h4 class="font-serif text-white font-normal text-sm uppercase tracking-[0.2em] mb-5">Sanctuaries</h4>
                    <ul class="space-y-2.5 text-xs text-stone-400 font-light">
                        <li><a href="{{ route('shop.category', 'clothing-robes') }}" class="hover:text-amber-300 transition">Quilted Jackets & Robes</a></li>
                        <li><a href="{{ route('shop.category', 'bedsheets-linen') }}" class="hover:text-amber-300 transition">Heirloom Bedsheets</a></li>
                        <li><a href="{{ route('shop.category', 'dohars-quilts') }}" class="hover:text-amber-300 transition">Reversible Mulmul Dohars</a></li>
                        <li><a href="{{ route('shop.category', 'dining-table-linen') }}" class="hover:text-amber-300 transition">Dining Table Linen</a></li>
                        <li><a href="{{ route('shop.category', 'cushions-throws') }}" class="hover:text-amber-300 transition">Cushions & Jute Throws</a></li>
                        <li><a href="{{ route('shop.category', 'bags-accessories') }}" class="hover:text-amber-300 transition">Quilted Bags & Totes</a></li>
                        <li><a href="{{ route('shop.category', 'rugs-dhurries') }}" class="hover:text-amber-300 transition">Handwoven Cotton Rugs</a></li>
                    </ul>
                </div>

                <!-- Customer Care -->
                <div>
                    <h4 class="font-serif text-white font-normal text-sm uppercase tracking-[0.2em] mb-5">Atelier Heritage</h4>
                    <ul class="space-y-2.5 text-xs text-stone-400 font-light">
                        <li><a href="{{ route('craft') }}" class="hover:text-amber-300 transition">The Sanganeri Block Craft</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-amber-300 transition">Our Jaipur Heritage</a></li>
                        <li><a href="{{ route('gifting') }}" class="hover:text-amber-300 transition">Bespoke Wedding Favors</a></li>
                        <li><a href="{{ route('order.track.index') }}" class="hover:text-amber-300 transition">Track Your Consignment</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-300 transition">Contact Concierge</a></li>
                        <li><a href="{{ route('wishlist.index') }}" class="hover:text-amber-300 transition">Curated Wishlist</a></li>
                        <li><a href="{{ route('account.dashboard') }}" class="hover:text-amber-300 transition">Client Dashboard</a></li>
                    </ul>
                </div>

                <!-- Newsletter & Offers -->
                <div>
                    <h4 class="font-serif text-white font-normal text-sm uppercase tracking-[0.2em] mb-2">The Raatrani Gazette</h4>
                    <p class="text-xs text-stone-400 mb-4 font-light leading-relaxed">Privileged access to rare batch releases, craft folklore, and an instant 10% welcome coupon.</p>
                    <form onsubmit="handleNewsletter(event)" class="space-y-2.5">
                        <input type="email" id="newsletter-email" required placeholder="Enter your email" class="w-full px-4 py-2.5 text-xs bg-[#201c19] text-white rounded-xl border border-[#38312b] focus:outline-none focus:border-amber-300 font-light placeholder-stone-500">
                        <button type="submit" class="w-full py-2.5 bg-[#8b3a3a] hover:bg-[#a14444] text-white text-xs uppercase tracking-[0.18em] font-medium rounded-xl transition cursor-pointer shadow-xs">
                            Request Invitation
                        </button>
                    </form>
                    <div id="newsletter-msg" class="hidden text-xs text-amber-300 pt-1"></div>
                </div>
            </div>

            <!-- Bottom Copyright & Payment Methods -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-4 font-light">
                <p>© {{ date('Y') }} RAATRANI ATELIER. Handcrafted in Jaipur. All rights reserved.</p>
                <div class="flex items-center gap-3 text-stone-400">
                    <span class="text-[10.5px] uppercase tracking-wider text-[#8c7b6c]">Secure Encrypted Checkout:</span>
                    <span class="px-2.5 py-0.5 bg-[#201c19] border border-[#322c27] rounded text-[10px]">UPI / QR</span>
                    <span class="px-2.5 py-0.5 bg-[#201c19] border border-[#322c27] rounded text-[10px]">Cards</span>
                    <span class="px-2.5 py-0.5 bg-[#201c19] border border-[#322c27] rounded text-[10px]">NetBanking</span>
                    <span class="px-2.5 py-0.5 bg-[#201c19] border border-[#322c27] rounded text-[10px]">Cash On Delivery</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Storefront Core Utilities -->
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Cart Drawer Controls
        function openCartDrawer() {
            document.getElementById('cart-drawer-backdrop').classList.remove('opacity-0', 'pointer-events-none');
            document.getElementById('cart-drawer-panel').classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden';
        }

        function closeCartDrawer() {
            document.getElementById('cart-drawer-backdrop').classList.add('opacity-0', 'pointer-events-none');
            document.getElementById('cart-drawer-panel').classList.add('translate-x-full');
            document.body.style.overflow = '';
        }

        // Mobile Menu Controls
        function openMobileMenu() {
            document.getElementById('mobile-menu').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            document.getElementById('mobile-menu').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Search Modal Controls
        function openSearchModal() {
            const modal = document.getElementById('search-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            setTimeout(() => document.getElementById('search-modal-input')?.focus(), 100);
        }

        function closeSearchModal() {
            const modal = document.getElementById('search-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.getElementById('search-modal')?.addEventListener('click', closeSearchModal);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCartDrawer();
                closeMobileMenu();
                closeSearchModal();
            }
        });

        // Toast System
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `px-5 py-3.5 rounded-xl shadow-xl text-xs font-medium flex items-center gap-2 transform transition-all duration-300 translate-y-2 opacity-0 ${
                type === 'success' ? 'bg-[#141210] text-[#FAF7F2] border border-amber-300/40' : 'bg-rose-900 text-white'
            }`;
            toast.innerHTML = `
                <span>${type === 'success' ? '✦' : '✕'}</span>
                <span>${message}</span>
            `;
            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-y-2', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        // Global Currency Toggle
        const exchangeRates = {
            'INR': { rate: 1, symbol: '₹' },
            'USD': { rate: 0.012, symbol: '$' },
            'GBP': { rate: 0.0094, symbol: '£' },
            'EUR': { rate: 0.011, symbol: '€' },
            'AED': { rate: 0.044, symbol: 'AED ' }
        };

        function setCurrency(code, symbol, label) {
            const el = document.getElementById('active-currency-label');
            if (el) el.textContent = label;
            localStorage.setItem('raatrani_currency', code);
            showToast(`Display currency set to ${code} (${symbol})`, 'success');
        }

        // Quick Add to Bag AJAX
        async function quickAddToCart(productId, option = null, quantity = 1) {
            try {
                const res = await fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity,
                        option: option
                    })
                });

                const data = await res.json();
                if (data.success) {
                    showToast(data.message);
                    updateCartUI(data.data);
                    openCartDrawer();
                } else {
                    showToast(data.message || 'Could not add to bag', 'error');
                }
            } catch (err) {
                console.error(err);
                showToast('Failed to add item', 'error');
            }
        }

        // Toggle Wishlist AJAX
        async function toggleWishlist(productId, btnElement) {
            try {
                const res = await fetch("{{ route('wishlist.toggle') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ product_id: productId })
                });

                const data = await res.json();
                if (data.success) {
                    showToast(data.message);
                    const svg = btnElement.querySelector('svg');
                    const badge = document.getElementById('wishlist-badge');

                    if (data.in_wishlist) {
                        svg.classList.add('fill-rose-600', 'text-rose-600');
                        svg.classList.remove('fill-none', 'text-stone-700');
                    } else {
                        svg.classList.remove('fill-rose-600', 'text-rose-600');
                        svg.classList.add('fill-none', 'text-stone-700');
                    }

                    if (badge) {
                        badge.innerText = data.count;
                        if (data.count > 0) {
                            badge.classList.remove('hidden');
                        } else {
                            badge.classList.add('hidden');
                        }
                    }
                }
            } catch (err) {
                console.error(err);
                showToast('Could not update wishlist', 'error');
            }
        }

        // Update Cart Drawer & Badges dynamically
        function updateCartUI(cartData) {
            const headerCount = document.getElementById('header-cart-count');
            const drawerCount = document.getElementById('drawer-item-count');
            if (headerCount) headerCount.innerText = cartData.count;
            if (drawerCount) drawerCount.innerText = cartData.count;

            fetch("{{ route('cart.drawer') }}", {
                headers: { 'Accept': 'text/html' }
            })
            .then(res => res.text())
            .then(html => {
                const container = document.getElementById('cart-drawer-container');
                if (container) container.innerHTML = html;
            });
        }

        // Apply Coupon in Cart Drawer
        async function applyDrawerCoupon(event) {
            event.preventDefault();
            const input = document.getElementById('drawer-coupon-input');
            const code = input?.value.trim();
            if (!code) return;

            try {
                const res = await fetch("{{ route('cart.coupon.apply') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ code: code })
                });

                const data = await res.json();
                if (data.success) {
                    showToast(data.message);
                    updateCartUI(data.data);
                } else {
                    showToast(data.message || 'Invalid coupon code', 'error');
                }
            } catch (err) {
                console.error(err);
                showToast('Could not apply coupon', 'error');
            }
        }

        // Remove Coupon in Cart Drawer
        async function removeDrawerCoupon() {
            try {
                const res = await fetch("{{ route('cart.coupon.remove') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await res.json();
                if (data.success) {
                    showToast(data.message);
                    updateCartUI(data.data);
                }
            } catch (err) {
                console.error(err);
                showToast('Could not remove coupon', 'error');
            }
        }

        // Aliases for cart drawer compatibility
        function removeFromCart(rowId) { return removeDrawerItem(rowId); }
        function updateCartQuantity(rowId, quantity) { return updateDrawerQuantity(rowId, quantity); }

        // Update item quantity in drawer
        async function updateDrawerQuantity(rowId, quantity) {
            try {
                const res = await fetch("{{ route('cart.update') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ cart_key: rowId, quantity: quantity })
                });

                const data = await res.json();
                if (data.success) {
                    updateCartUI(data.data);
                }
            } catch (err) {
                console.error(err);
            }
        }

        // Remove item from drawer
        async function removeDrawerItem(rowId) {
            try {
                const res = await fetch("/cart/remove/" + encodeURIComponent(rowId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await res.json();
                if (data.success) {
                    showToast('Item removed from bag');
                    updateCartUI(data.data);
                }
            } catch (err) {
                console.error(err);
            }
        }

        // Newsletter handler
        function handleNewsletter(e) {
            e.preventDefault();
            const input = document.getElementById('newsletter-email');
            const msg = document.getElementById('newsletter-msg');
            if (input && msg) {
                msg.innerText = '✦ Welcome to the circle. Use code RAATRANI10 for 10% off.';
                msg.classList.remove('hidden');
                input.value = '';
            }
        }
    </script>
</body>
</html>
