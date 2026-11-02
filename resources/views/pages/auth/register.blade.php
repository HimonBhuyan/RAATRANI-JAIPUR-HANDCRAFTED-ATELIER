<x-layouts.app title="Create Account | Raatrani">
    <div class="max-w-md mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-xs space-y-6">
            <div class="text-center space-y-2">
                <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-12 h-12 rounded-full mx-auto shadow-xs">
                <h1 class="font-serif text-2xl font-bold text-stone-900">Create an Account</h1>
                <p class="text-xs text-stone-500">Enjoy seamless ordering, order tracking, and exclusive festive drops.</p>
            </div>

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Full Name *</label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        value="{{ old('name') }}" 
                        placeholder="Ananya Sharma" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                    @error('name') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Email Address *</label>
                    <input 
                        type="email" 
                        name="email" 
                        required 
                        value="{{ old('email') }}" 
                        placeholder="you@example.com" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                    @error('email') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Phone Number (WhatsApp)</label>
                    <input 
                        type="tel" 
                        name="phone" 
                        value="{{ old('phone') }}" 
                        placeholder="+91 9876543210" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                    @error('phone') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Password *</label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="At least 6 characters" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                    @error('password') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Confirm Password *</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        placeholder="Re-enter password" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                </div>

                <button type="submit" class="w-full py-3 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                    Register Account
                </button>
            </form>

            <div class="text-center pt-2 text-xs text-stone-500 border-t border-stone-100">
                Already registered? 
                <a href="{{ route('login') }}" class="font-bold text-amber-900 hover:underline">Log in here</a>
            </div>
        </div>
    </div>
</x-layouts.app>

