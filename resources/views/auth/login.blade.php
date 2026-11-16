<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#faf8f5] px-6">
        <div class="max-w-md w-full">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.04)] border border-stone-200/70">

                {{-- Back Link --}}
                <div class="mb-6">
                    <a href="{{ route('user.home') }}" class="inline-flex items-center text-[10px] uppercase tracking-widest text-stone-400 hover:text-rose-700 transition font-bold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Home
                    </a>
                </div>

                {{-- Logo --}}
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-20 w-auto" alt="Glam Logo">
                </div>

                {{-- Heading --}}
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-serif italic text-stone-800 tracking-tight">Selamat Datang</h2>
                    <p class="text-[9px] uppercase tracking-[0.3em] text-stone-400 mt-2 font-bold">Masuk ke Akun Glam Anda</p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-rose-700 font-bold block mb-1">Alamat Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <div class="flex justify-between items-center mb-1">
                            <label class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[9px] text-stone-300 hover:text-rose-600 italic transition">Lupa sandi?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px]" />
                    </div>

                    <button type="submit" class="w-full bg-stone-900 text-white py-5 rounded-full font-bold uppercase text-[10px] tracking-[0.3em] hover:bg-rose-700 transition-all shadow-xl italic">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="mt-8 text-center pt-6 border-t border-stone-100">
                    <p class="text-[11px] text-stone-400 italic">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-rose-700 font-bold hover:underline ml-1 uppercase tracking-wider not-italic">Daftar</a>
                    </p>
                </div>
            </div>

            <p class="text-center mt-8 text-[9px] uppercase tracking-[0.4em] text-stone-300 font-bold italic">
                Modern Glamour & Luxury Service
            </p>
        </div>
    </div>
</x-guest-layout>
