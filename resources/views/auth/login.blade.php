<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-white px-6">
        <div class="max-w-md w-full">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.03)] border border-stone-50">

                <div class="mb-6">
                    <a href="{{ route('user.home') }}" class="inline-flex items-center text-[10px] uppercase tracking-widest text-stone-400 hover:text-pink-500 transition font-bold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Home
                    </a>
                </div>

                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-20 w-auto" alt="Glam Logo">
                </div>

                <div class="text-center mb-10">
                    <h2 class="text-3xl font-serif italic text-stone-800 tracking-tight">Selamat Datang</h2>
                    <p class="text-[9px] uppercase tracking-[0.3em] text-stone-400 mt-1 font-bold">Masuk ke Akun Glam Anda</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf
                    <div class="border-b border-stone-100 pb-2 focus-within:border-pink-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-pink-500 font-bold block mb-1">Alamat Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-100 pb-2 focus-within:border-pink-300 transition-all">
                        <div class="flex justify-between items-center mb-1">
                            <label class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[9px] text-stone-300 hover:text-pink-400 italic transition">Lupa sandi?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px]" />
                    </div>

                    <button type="submit" class="w-full bg-stone-900 text-white py-5 rounded-full font-bold uppercase text-[10px] tracking-[0.3em] hover:bg-pink-600 transition-all shadow-xl italic">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="mt-8 text-center pt-6 border-t border-stone-50">
                    <p class="text-[11px] text-stone-400 italic">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline ml-1 uppercase tracking-wider not-italic">Daftar</a>
                    </p>
                </div>
            </div>
            </div>
    </div>
</x-guest-layout>