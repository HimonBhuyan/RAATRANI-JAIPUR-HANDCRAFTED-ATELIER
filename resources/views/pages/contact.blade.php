<x-layouts.app title="Contact Us & Studio Care | Raatrani">
    <div class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-800">We Love Hearing From You</span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900 mt-1">Get in Touch with Raatrani</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-2 max-w-md mx-auto">
                Whether you have sizing questions, custom sizing requirements, or bulk inquiries, our studio team is always here to assist.
            </p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left: Contact Details Cards (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- WhatsApp Priority Card -->
                <div class="bg-emerald-50/80 rounded-2xl border border-emerald-200 p-6 space-y-3">
                    <div class="flex items-center gap-2 text-emerald-800 font-bold text-xs uppercase tracking-wider">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.585 1.776.84 2.802.84 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.774-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.086.289.13.332.202.043.072.043.419-.101.824z"/>
                        </svg>
                        <span>Fastest Response</span>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-stone-900">Direct WhatsApp Assistance</h3>
                    <p class="text-xs text-stone-600 leading-relaxed">
                        For immediate assistance, custom orders, or video calls to see real fabrics in sunlight, connect directly with our studio founders.
                    </p>
                    <a href="https://wa.me/918946966292" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition">
                        <span>Message +91 8946966292</span>
                    </a>
                </div>

                <!-- Info Cards -->
                <div class="bg-white rounded-2xl border border-stone-200 p-6 space-y-4 text-xs text-stone-700">
                    <div>
                        <h4 class="font-serif font-bold text-stone-900 text-sm uppercase tracking-wider mb-1">Studio Address</h4>
                        <p class="text-stone-600">Raatrani Artisanal Studio</p>
                        <p class="text-stone-600">Near Hawa Mahal & Sanganer Crafts Center</p>
                        <p class="text-stone-600">Jaipur, Rajasthan 302002, India</p>
                    </div>

                    <div class="pt-3 border-t border-stone-100">
                        <h4 class="font-serif font-bold text-stone-900 text-sm uppercase tracking-wider mb-1">Instagram Direct</h4>
                        <p class="text-stone-600">DM us for styling tips and custom dimensions:</p>
                        <a href="https://instagram.com/the_raatrani" target="_blank" class="text-amber-800 font-bold hover:underline">@the_raatrani</a>
                    </div>

                    <div class="pt-3 border-t border-stone-100">
                        <h4 class="font-serif font-bold text-stone-900 text-sm uppercase tracking-wider mb-1">Operating Hours</h4>
                        <p class="text-stone-600">Monday – Saturday: 10:00 AM – 7:30 PM IST</p>
                        <p class="text-stone-600">Sunday: WhatsApp Inquiries Monitored</p>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Contact Form (7 cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl border border-stone-200 p-5 sm:p-8 shadow-xs">
                    <h3 class="font-serif text-xl font-bold text-stone-900 mb-1">Send a Message</h3>
                    <p class="text-xs text-stone-500 mb-6">Our customer care team typically responds within 2-4 hours.</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Name *</label>
                                <input type="text" name="name" required placeholder="Full Name" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700">
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Email Address *</label>
                                <input type="email" name="email" required placeholder="you@example.com" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700">
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Phone Number (WhatsApp)</label>
                                <input type="tel" name="phone" placeholder="+91 9876543210" class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700">
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Inquiry Type *</label>
                                <select name="inquiry_type" required class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700">
                                    <option value="general">General Inquiries & Order Tracking</option>
                                    <option value="custom_order">Custom Sizing / Tailoring</option>
                                    <option value="corporate_gifting">Corporate / Festive Gifting</option>
                                    <option value="wholesale">Wholesale & Boutique Resellers</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Subject</label>
                            <input type="text" name="subject" placeholder="e.g. Question about waffle bathrobe sizing..." class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Your Message *</label>
                            <textarea name="message" rows="4" required placeholder="Tell us how we can help you..." class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

