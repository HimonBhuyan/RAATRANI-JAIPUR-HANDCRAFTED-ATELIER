<x-layouts.app title="Customer & Admin Login | Raatrani">
    <div class="max-w-md mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-xs space-y-6">
            <div class="text-center space-y-2">
                <img src="{{ asset('images/brand/logo.png') }}" alt="Raatrani" class="w-12 h-12 rounded-full mx-auto shadow-xs">
                <h1 class="font-serif text-2xl font-bold text-stone-900">Welcome Back</h1>
                <p class="text-xs text-stone-500">Log in to view your orders, address book, or access admin portal.</p>
            </div>

            <!-- Demo Credentials Helper Pill -->
            <div class="p-3 bg-amber-50/80 rounded-xl border border-amber-200/70 text-[11px] text-stone-700 space-y-1">
                <p class="font-bold text-amber-900">Demo Accounts Available:</p>
                <div class="flex justify-between">
                    <span>👑 Admin: <strong>admin@raatrani.com</strong></span>
                    <span>Pass: <strong>password123</strong></span>
                </div>
                <div class="flex justify-between">
                    <span>🛍️ Customer: <strong>ananya.sharma@example.com</strong></span>
                    <span>Pass: <strong>secret123</strong></span>
                </div>
            </div>

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf

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
                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">Password *</label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="••••••••" 
                        class="w-full text-xs px-3.5 py-2.5 bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-700"
                    >
                    @error('password') <p class="text-[11px] text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-between text-xs text-stone-600">
                    <label class="flex items-center gap-1.5 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded text-amber-700 focus:ring-amber-700">
                        <span>Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 bg-stone-900 hover:bg-stone-800 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition">
                    Sign In
                </button>
            </form>

            <div class="text-center pt-2 text-xs text-stone-500 border-t border-stone-100">
                New to Raatrani? 
                <a href="{{ route('register') }}" class="font-bold text-amber-900 hover:underline">Create an Account</a>
            </div>
        </div>
    </div>
</x-layouts.app>

