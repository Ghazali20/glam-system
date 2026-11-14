<x-app-layout>
    {{-- Halaman Home dengan Tema Modern Glamour --}}
    <section class="bg-stone-900 min-h-[calc(100vh-64px)] flex items-center justify-center text-center relative overflow-hidden">
        {{-- Efek Dekorasi Latar Belakang --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-pink-500 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-stone-500 rounded-full blur-[120px]"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6">
            {{-- Label Atas --}}
            <span class="text-[10px] tracking-[0.5em] uppercase mb-6 text-white font-bold block animate-pulse">
                MUA Wedding & Graduation Specialist
            </span>

            {{-- Judul Utama Mewah --}}
            <h1 class="text-6xl md:text-8xl font-serif text-white mb-10 leading-[1.1]">
                Modern <br>
                <span class="italic text-pink-300 font-normal">Glamour.</span>
            </h1>

            {{-- Tombol Navigasi Utama --}}
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="{{ route('user.layanan.index') }}"
                   class="bg-pink-600 text-white px-8 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:scale-105 transition duration-300 shadow-2xl">
                    Lihat Paket Layanan
                </a>
                <a href="{{ route('user.booking.create') }}"
                   class="bg-white/10 backdrop-blur border border-white/20 text-white px-8 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:bg-white hover:text-stone-900 transition duration-300 shadow-xl">
                    Pesan Sekarang
                </a>
                <a href="{{ route('user.katalog') }}"
                   class="border border-white/30 text-white px-8 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:bg-white hover:text-stone-900 transition duration-300">
                    Buka Katalog
                </a>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-30">
            <span class="text-[8px] uppercase tracking-widest text-white">Explore</span>
            <div class="w-px h-12 bg-gradient-to-b from-white to-transparent"></div>
        </div>
    </section>
</x-app-layout>