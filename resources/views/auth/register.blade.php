<x-guest-layout>
    <div class="min-h-screen bg-[#faf8f5] px-4 py-5 sm:px-8 sm:py-8 lg:px-12 lg:py-10">
        <div class="mx-auto grid min-h-[calc(100vh-2.5rem)] max-w-6xl overflow-hidden rounded-[2.5rem] bg-white shadow-[0_25px_80px_rgba(41,37,36,0.08)] lg:min-h-[calc(100vh-5rem)] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="relative hidden overflow-hidden bg-stone-900 p-12 text-white lg:flex lg:flex-col lg:justify-between">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(190,24,93,0.35),transparent_42%),linear-gradient(145deg,#292524,#0c0a09)]"></div>
                <div class="absolute -bottom-24 -left-20 h-72 w-72 rounded-full border border-rose-300/20"></div>
                <div class="absolute -bottom-16 -left-12 h-56 w-56 rounded-full border border-rose-300/10"></div>
                <div class="relative z-10">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-20 w-auto brightness-0 invert" alt="Glam By Ramdiah">
                    <p class="mt-8 text-[10px] uppercase tracking-[0.35em] text-rose-200 font-bold">Luxury Bridal & MUA</p>
                    <h1 class="mt-5 max-w-sm font-serif text-5xl italic leading-tight">Begin your signature glow journey.</h1>
                </div>
                <p class="relative z-10 max-w-xs text-sm leading-relaxed text-stone-300 font-serif italic">
                    Buat akun untuk booking lebih mudah dan menyimpan seluruh perjalanan look Anda bersama Glam.
                </p>
            </div>

            <div class="flex items-center justify-center p-6 sm:p-10 lg:p-14">
                <div class="w-full max-w-md">

                {{-- Back Link --}}
                <div class="mb-8">
                    <a href="{{ route('user.home') }}" class="inline-flex items-center text-[10px] uppercase tracking-widest text-stone-400 hover:text-rose-700 transition font-bold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Home
                    </a>
                </div>

                <div class="mb-7 flex justify-center lg:hidden">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-16 w-auto" alt="Glam Logo">
                </div>

                <div class="mb-10 text-center">
                    <h2 class="font-serif text-3xl italic tracking-tight text-stone-800 sm:text-4xl">Daftar Akun</h2>
                    <p class="text-[9px] uppercase tracking-[0.3em] text-stone-400 mt-2 font-bold">Mulai Perjalanan Kecantikan Anda</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-rose-700 font-bold block mb-1">Nama Lengkap</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="Nama Anda">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block mb-1">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block mb-1">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200" placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full bg-stone-900 text-white py-5 rounded-full font-bold uppercase text-[10px] tracking-[0.3em] hover:bg-rose-700 transition-all shadow-xl italic">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="mt-8 text-center pt-6 border-t border-stone-100">
                    <p class="text-[11px] text-stone-400 italic">Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-rose-700 font-bold hover:underline ml-1 uppercase tracking-wider not-italic">Login</a>
                    </p>
                </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>