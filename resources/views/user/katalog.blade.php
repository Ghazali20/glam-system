<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-serif italic text-3xl text-stone-900 leading-tight">
                    {{ __('Katalog Makeup Look') }}
                </h2>
                <p class="text-stone-500 text-sm font-serif mt-1">Inspirasi riasan elegan dan mempesona untuk setiap momen berharga Anda</p>
            </div>
            <a href="{{ route('user.booking.create') }}"
               class="self-start md:self-auto bg-stone-900 text-white px-6 py-3 rounded-full text-[11px] font-bold uppercase tracking-widest hover:bg-pink-600 transition shadow-md italic">
                Booking Jadwal ✨
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-white" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Kategori Filter Tabs --}}
            @if(isset($categories) && $categories->isNotEmpty())
                <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
                    <button @click="activeCategory = 'all'"
                            :class="activeCategory === 'all'
                                ? 'bg-stone-900 text-white shadow-md'
                                : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                            class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-200">
                        Semua Look
                    </button>

                    @foreach($categories as $category)
                        <button @click="activeCategory = '{{ $category->slug }}'"
                                :class="activeCategory === '{{ $category->slug }}'
                                    ? 'bg-stone-900 text-white shadow-md'
                                    : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                                class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-200">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            @endif

            {{-- Grid Portofolio --}}
            @if(isset($portfolios) && $portfolios->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($portfolios as $portfolio)
                        <div x-show="activeCategory === 'all' || activeCategory === '{{ $portfolio->category?->slug }}'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="group relative overflow-hidden rounded-[2.5rem] shadow-sm border border-stone-100 aspect-[3/4] bg-stone-100">

                            {{-- Gambar Portofolio --}}
                            <img src="{{ $portfolio->image_url }}"
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-105"
                                 alt="{{ $portfolio->title }}"
                                 loading="lazy"
                                 decoding="async">

                            {{-- Overlay Gradien & Info Hover --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-white">
                                @if($portfolio->category)
                                    <span class="text-[9px] uppercase tracking-widest text-pink-300 font-bold block mb-1">
                                        {{ $portfolio->category->name }}
                                    </span>
                                @endif
                                <h3 class="font-serif italic text-lg leading-snug font-bold">
                                    {{ $portfolio->title }}
                                </h3>
                                @if($portfolio->description)
                                    <p class="text-xs text-stone-200 font-serif italic mt-1.5 line-clamp-2 leading-relaxed">
                                        {{ $portfolio->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-stone-50 rounded-[3rem] border border-dashed border-stone-200">
                    <p class="text-stone-400 italic">Belum ada foto portofolio yang ditampilkan.</p>
                </div>
            @endif

            {{-- CTA Penutup --}}
            <div class="mt-20 text-center bg-stone-50 rounded-[3rem] p-12 md:p-16 border border-stone-100">
                <span class="text-[10px] tracking-[0.3em] uppercase text-pink-600 font-bold block mb-2">Exclusive Look</span>
                <h3 class="text-3xl md:text-4xl font-serif text-stone-900 italic mb-4">Ingin Tampil Mempesona di Hari Spesial?</h3>
                <p class="text-stone-600 text-sm max-w-xl mx-auto mb-8 font-serif leading-relaxed">
                    Setiap detail makeup disesuaikan dengan karakter wajah dan preferensi busana Anda agar tercipta riasan yang tahan lama, segar, dan anggun.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('user.booking.create') }}"
                       class="w-full sm:w-auto bg-stone-900 text-white px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:bg-pink-600 transition shadow-lg italic">
                        Booking Now ✨
                    </a>
                    <a href="{{ route('user.layanan.index') }}"
                       class="w-full sm:w-auto bg-white border border-stone-200 text-stone-700 px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:bg-stone-100 transition shadow-sm italic">
                        Lihat Daftar Paket
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
