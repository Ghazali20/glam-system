<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#faf8f5] px-6 py-12">
        <div class="max-w-md w-full">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.04)] border border-stone-200/70">
                <div class="mb-6">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-[10px] uppercase tracking-widest text-stone-400 hover:text-rose-700 transition font-bold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Login
                    </a>
                </div>

                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-20 w-auto" alt="Glam Logo">
                </div>

                <div class="text-center mb-10">
                    <h2 class="text-3xl font-serif italic text-stone-800 tracking-tight">Atur Ulang Sandi</h2>
                    <p class="text-[9px] uppercase tracking-[0.3em] text-stone-400 mt-2 font-bold">Buat Sandi Baru Anda</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label for="email" class="text-[9px] uppercase tracking-widest text-rose-700 font-bold block mb-1">Alamat Email</label>
                        <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label for="password" class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block mb-1">Password Baru</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px]" />
                    </div>

                    <div class="border-b border-stone-200/80 pb-2 focus-within:border-rose-300 transition-all">
                        <label for="password_confirmation" class="text-[9px] uppercase tracking-widest text-stone-400 font-bold block mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full border-none p-0 focus:ring-0 text-stone-700 text-sm bg-transparent placeholder-stone-200"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[10px]" />
                    </div>

                    <button type="submit" class="w-full bg-stone-900 text-white py-5 rounded-full font-bold uppercase text-[10px] tracking-[0.3em] hover:bg-rose-700 transition-all shadow-xl italic">
                        Simpan Sandi Baru
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-[9px] uppercase tracking-[0.4em] text-stone-300 font-bold italic">
                Modern Glamour & Luxury Service
            </p>
        </div>
    </div>
</x-guest-layout>
