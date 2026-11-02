<x-layouts.app title="Custom & Corporate Gifting | Raatrani">
    <div class="bg-stone-900 text-white py-16 text-center">
        <div class="max-w-4xl mx-auto px-4 space-y-3">
            <span class="text-xs uppercase font-bold tracking-[0.25em] text-amber-300">Gifting Made Meaningful</span>
            <h1 class="font-serif text-4xl sm:text-5xl font-bold">Festive, Corporate & Wedding Favours</h1>
            <p class="text-xs sm:text-sm text-stone-300 max-w-xl mx-auto leading-relaxed">
                Curate memorable bespoke gifts wrapped in authentic hand block printed fabrics. Custom sizes, corporate branding, and personalized notes.
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        
        <!-- Showcase Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden p-6 space-y-3 text-center shadow-xs">
                <img src="{{ asset('images/products/gifting-box-blue.jpg') }}" alt="Fabric Gifting Boxes" class="w-full aspect-square object-cover rounded-xl mb-3">
                <h3 class="font-serif text-lg font-bold text-stone-900">Fabric Keepsake Boxes</h3>
                <p class="text-xs text-stone-600 leading-relaxed">Reusable rigid keepsake boxes bound in hand block printed cotton. Includes matching journals and coasters.</p>
                <span class="text-xs font-bold text-amber-800 block">Starting at ₹1,299 / set</span>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden p-6 space-y-3 text-center shadow-xs">
                <img src="{{ asset('images/products/diwan-set-sage.jpg') }}" alt="Royal Diwan Sets" class="w-full aspect-square object-cover rounded-xl mb-3">
                <h3 class="font-serif text-lg font-bold text-stone-900">Wedding Diwan Sets</h3>
                <p class="text-xs text-stone-600 leading-relaxed">6-piece and 8-piece festive diwan sets. Ideal for wedding trousseaus, housewarmings, and festive gifts.</p>
                <span class="text-xs font-bold text-amber-800 block">Starting at ₹3,299 / set</span>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden p-6 space-y-3 text-center shadow-xs">
                <img src="{{ asset('images/products/tote-set-jungle-emerald.jpg') }}" alt="Quilted Tote Hampers" class="w-full aspect-square object-cover rounded-xl mb-3">
                <h3 class="font-serif text-lg font-bold text-stone-900">Jungle Haven Hampers</h3>
                <p class="text-xs text-stone-600 leading-relaxed">1 Quilted Tote Bag filled with 3 utility pouches and pure waffle hand towels. A luxurious favorite.</p>
                <span class="text-xs font-bold text-amber-800 block">Starting at ₹2,199 / set</span>
            </div>
        </div>

        <!-- Custom Inquiry Form -->
        <div class="bg-stone-50 rounded-2xl border border-stone-200 p-5 sm:p-10">
            <div class="max-w-2xl mx-auto space-y-6">
                <div class="text-center space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Direct Studio Inquiries</span>
                    <h2 class="font-serif text-3xl font-bold text-stone-900">Request a Custom Gifting Proposal</h2>
                    <p class="text-xs text-stone-500">Fill out your requirements below, or contact us directly on WhatsApp for expedited responses.</p>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="inquiry_type" value="corporate_gifting">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Name *</label>
                            <input type="text" name="name" required placeholder="e.g. Priya Kapoor" class="w-full text-xs px-3.5 py-2.5 bg-white border border-stone-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Company / Event Name</label>
                            <input type="text" name="subject" placeholder="e.g. Diwali Corporate Hampers / Wedding" class="w-full text-xs px-3.5 py-2.5 bg-white border border-stone-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Email Address *</label>
                            <input type="email" name="email" required placeholder="priya@company.com" class="w-full text-xs px-3.5 py-2.5 bg-white border border-stone-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Phone / WhatsApp Number *</label>
                            <input type="tel" name="phone" required placeholder="+91 9876543210" class="w-full text-xs px-3.5 py-2.5 bg-white border border-stone-300 rounded-lg">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Quantity, Timeline & Details *</label>
                        <textarea name="message" rows="4" required placeholder="Tell us about the estimated number of pieces (e.g. 50 boxes), required date, preferred prints (e.g. Indigo, Rose), and any customization..." class="w-full text-xs px-3.5 py-2.5 bg-white border border-stone-300 rounded-lg"></textarea>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                        <button type="submit" class="w-full sm:flex-1 py-3.5 bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold uppercase tracking-wider rounded-lg transition">
                            Submit Gifting Request
                        </button>
                        <a href="https://wa.me/918946966292?text={{ urlencode('Hello Raatrani! I would like to discuss custom / corporate gifting with your team.') }}" target="_blank" class="w-full sm:w-auto px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold uppercase tracking-wider rounded-lg transition text-center">
                            Chat on WhatsApp
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>

