<!DOCTYPE html>
<html lang="en" class="h-full bg-stone-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Dashboard | Raatrani Management' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-stone-800">

    <div class="min-h-full flex flex-col lg:flex-row">
        <!-- Admin Sidebar Navigation -->
        <aside class="w-full lg:w-64 bg-stone-900 text-stone-300 flex flex-col justify-between shrink-0">
            <div>
                <!-- Brand in Admin -->
                <div class="p-6 border-b border-stone-800 flex items-center gap-3">
                    <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-10 h-10 rounded-full border border-amber-500/40">
                    <div>
                        <span class="font-serif text-xl font-bold tracking-wider text-white">RAATRANI</span>
                        <span class="block text-[10px] text-amber-400 font-mono tracking-widest uppercase">Admin Portal</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-1.5 text-xs font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-800 text-white font-bold' : 'hover:bg-stone-800 text-stone-300' }}">
                        <span>📊 Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.products.*') ? 'bg-amber-800 text-white font-bold' : 'hover:bg-stone-800 text-stone-300' }}">
                        <span>📦 Products (Catalog)</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.orders.*') ? 'bg-amber-800 text-white font-bold' : 'hover:bg-stone-800 text-stone-300' }}">
                        <span>🛍️ Customer Orders</span>
                    </a>
                    <a href="{{ route('admin.coupons.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.coupons.*') ? 'bg-amber-800 text-white font-bold' : 'hover:bg-stone-800 text-stone-300' }}">
                        <span>🎟️ Discount Coupons</span>
                    </a>
                    <a href="{{ route('admin.inquiries.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-amber-800 text-white font-bold' : 'hover:bg-stone-800 text-stone-300' }}">
                        <span>✉️ Gifting & Messages</span>
                    </a>
                </nav>
            </div>

            <!-- Footer links in Admin -->
            <div class="p-4 border-t border-stone-800 space-y-2 text-xs">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3 py-2 bg-stone-800 hover:bg-stone-700 text-stone-200 rounded-lg transition">
                    <span>View Public Store</span>
                    <span>↗</span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 text-rose-400 hover:text-rose-300 hover:bg-stone-800 rounded-lg transition cursor-pointer">
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Admin Canvas -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Admin Topbar -->
            <header class="bg-white border-b border-stone-200 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="font-serif text-xl font-bold text-stone-900">{{ $header ?? 'Dashboard' }}</h2>
                </div>
                <div class="flex items-center gap-3 text-xs">
                    <span class="text-stone-500">Logged in as: <strong class="text-stone-900">{{ Auth::user()->name }}</strong></span>
                </div>
            </header>

            <!-- Flash Messages in Admin -->
            @if(session('success'))
                <div class="p-4 max-w-7xl">
                    <div class="p-3 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-lg text-xs font-semibold">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 max-w-7xl">
                    <div class="p-3 bg-rose-50 border border-rose-200 text-rose-900 rounded-lg text-xs font-semibold">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Admin Body Slot -->
            <main class="p-6 max-w-7xl w-full">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

