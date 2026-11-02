<x-layouts.app title="Our Story & Heritage | Raatrani">
    <!-- Hero Banner -->
    <div class="relative bg-stone-900 text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image: url('{{ asset('images/products/craft-process.jpg') }}'); filter: blur(2px);"></div>
        <div class="relative max-w-4xl mx-auto px-4 text-center space-y-4">
            <span class="text-xs uppercase font-bold tracking-[0.25em] text-amber-300">The Story of Raatrani</span>
            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-stone-100">
                Where Artistry Meets Comfort
            </h1>
            <p class="text-xs sm:text-sm text-stone-300 max-w-2xl mx-auto leading-relaxed">
                Handcrafted. Timeless. You. Raatrani was founded with a singular devotion: to preserve the living rhythm of Jaipur hand block printing while curating serene, slow-made luxury for the modern home.
            </p>
        </div>
    </div>

    <!-- Main Narrative -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        <!-- Section 1 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="space-y-4">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Rooted in Rajasthan</span>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-stone-900 leading-snug">
                    An Ode to the Generational Printers of Sanganer & Bagru
                </h2>
                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                    Centuries before mass assembly lines and fast polyester fashion, Jaipur villages sang with the steady, meditative "thud... thud... thud" of wooden blocks pressing pigment into fine cotton cloth.
                </p>
                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                    At Raatrani, we partner directly with multigenerational artisan families. There are no middlemen. Every duvet, bathrobe, and tote is shaped by human hands, carrying the subtle imperfections that prove authentic slow craft.
                </p>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-stone-200">
                <img src="{{ asset('images/products/craft-process.jpg') }}" alt="Artisan stamping wooden block" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Section 2: Values -->
        <div class="bg-amber-50/60 rounded-2xl border border-amber-200/80 p-8 sm:p-10 space-y-6">
            <h3 class="font-serif text-2xl font-bold text-stone-900 text-center">Our Slow Living Philosophy</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                <div class="space-y-2">
                    <span class="text-2xl">🌱</span>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-stone-900">100% Pure Natural Fibers</h4>
                    <p class="text-xs text-stone-600">Zero synthetic polyester. We work solely with combed mulmul cotton, waffle weaves, and golden natural jute.</p>
                </div>
                <div class="space-y-2">
                    <span class="text-2xl">🎨</span>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-stone-900">Mineral & Botanical Dyes</h4>
                    <p class="text-xs text-stone-600">Azo-free, skin-loving formulations that respect both delicate skin and the water table of Rajasthan.</p>
                </div>
                <div class="space-y-2">
                    <span class="text-2xl">🤝</span>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-stone-900">Fair-Trade Artisan Livelihoods</h4>
                    <p class="text-xs text-stone-600">Sustaining dignified livelihoods, empowering women needleworkers, and celebrating Indian heritage.</p>
                </div>
            </div>
        </div>

        <!-- Section 3: Instagram & Direct Connect -->
        <div class="text-center space-y-4 max-w-xl mx-auto">
            <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-16 h-16 rounded-full mx-auto shadow-sm">
            <h3 class="font-serif text-2xl font-bold text-stone-900">Follow Our Journey</h3>
            <p class="text-xs text-stone-600">
                Join our Instagram community <strong class="text-stone-900">@the_raatrani</strong> or converse directly with our studio founders on WhatsApp.
            </p>
            <div class="flex flex-wrap justify-center gap-3 pt-2">
                <a href="https://instagram.com/the_raatrani" target="_blank" class="px-6 py-2.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition">
                    Visit Instagram (@the_raatrani)
                </a>
                <a href="https://wa.me/918946966292" target="_blank" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition">
                    Chat on WhatsApp (+91 8946966292)
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>

