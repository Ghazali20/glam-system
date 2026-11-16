<x-app-layout>
    {{-- 1. HERO SECTION: EDITORIAL HIGH-FASHION SPLIT COVER (FRESH, SIMPLE, ANTI-AI) --}}
    <section class="relative bg-[#faf8f5] text-stone-900 overflow-hidden pt-8 pb-28 lg:pt-16 lg:pb-36">
        {{-- Subtle Luxury Background Pattern --}}
        <div class="absolute inset-0 pointer-events-none opacity-40">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-rose-100/60 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-10 w-80 h-80 bg-amber-50/80 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                {{-- Left Column: Typography & Direct Action --}}
                <div class="lg:col-span-7 space-y-6 text-left reveal-on-scroll">
                    {{-- Minimalist Brand Tag --}}
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-50 border border-rose-200/60 text-rose-800 text-[10px] font-bold uppercase tracking-[0.25em]">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-600 animate-pulse"></span>
                        <span>MUA Wedding & Graduation • Padang, Sumbar</span>
                    </div>

                    {{-- Main Editorial Headline --}}
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-serif text-stone-900 leading-[1.08] tracking-tight">
                        Sentuhan Elegan, <br>
                        <span class="italic font-normal text-rose-800">Kecantikan Abadi.</span>
                    </h1>

                    {{-- Simple & Direct Subtitle --}}
                    <p class="text-stone-600 text-base sm:text-lg font-serif italic max-w-xl leading-relaxed">
                        Layanan tata rias profesional dengan pendekatan <span class="text-stone-900 font-semibold not-italic">skin-first</span>—menghadirkan kilau mewah yang tahan 12+ jam tanpa kesan dempul berlebih. Khusus untuk hari pernikahan, wisuda, dan momen sakral Anda.
                    </p>

                    {{-- CTA Group --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                        <a href="{{ route('user.booking.create') }}"
                           class="bg-stone-900 text-white hover:bg-rose-700 px-8 py-4 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300 shadow-md hover:shadow-xl text-center italic flex items-center justify-center gap-2 group">
                            <span>Pesan Jadwal MUA</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </a>

                        <a href="{{ route('user.katalog') }}"
                           class="bg-white border border-stone-300 hover:border-stone-900 text-stone-900 px-8 py-4 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300 text-center">
                            Buka Katalog Lookbook
                        </a>
                    </div>

                    {{-- Social Proof Strip --}}
                    <div class="pt-6 border-t border-stone-200/80 flex flex-wrap items-center gap-4">
                        <div class="flex -space-x-2">
                            <img src="{{ asset('assets/images/grad-1.jpg') }}" alt="Client" class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm">
                            <img src="{{ asset('assets/images/wedding-1.jpg') }}" alt="Client" class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm">
                            <img src="{{ asset('assets/images/grad-2.jpg') }}" alt="Client" class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm">
                        </div>
                        <div class="text-xs text-stone-600 font-serif">
                            <div class="flex items-center gap-1 text-amber-500 text-xs">
                                ★★★★★ <span class="font-bold text-stone-900 ml-1">4.9 / 5.0</span>
                            </div>
                            <span class="text-stone-500 text-[11px]">Dipercaya oleh 500+ Pengantin & Wisudawati</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Magazine Collage Showcase (Human & Authentic) --}}
                <div class="lg:col-span-5 relative reveal-on-scroll reveal-delay-2">
                    <div class="relative mx-auto max-w-sm lg:max-w-none">

                        {{-- Main Large Bridal Portrait with Subtle Floating Effect --}}
                        <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white aspect-[3/4] bg-stone-200 animate-float animate-shimmer">
                            <img src="{{ asset('assets/images/wedding-1.jpg') }}"
                                 alt="Signature Wedding Look Glam By Ramdiah"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent flex items-end p-6">
                                <div class="text-white">
                                    <span class="text-[9px] uppercase tracking-widest text-rose-200 font-bold block">Signature Bridal</span>
                                    <p class="font-serif italic font-bold text-sm">Flawless & Timeless Wedding Look</p>
                                </div>
                            </div>
                        </div>

                        {{-- Floating Secondary Card (Detail Shot) --}}
                        <div class="absolute -bottom-8 -left-6 sm:-left-10 w-44 sm:w-52 rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white aspect-[3/4] bg-stone-100 hidden sm:block animate-float-slow">
                            <img src="{{ asset('assets/images/grad-1.jpg') }}"
                                 alt="Graduation Fresh Glam"
                                 class="w-full h-full object-cover">
                            <div class="absolute bottom-2 left-2 right-2 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-xl text-center">
                                <span class="text-[9px] uppercase tracking-wider text-rose-800 font-bold block">Graduation Glam</span>
                            </div>
                        </div>

                        {{-- Floating Quality Stamp Badge --}}
                        <div class="absolute -top-4 -right-4 bg-white/95 backdrop-blur-md border border-stone-200 shadow-xl rounded-2xl p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center font-bold">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-900">12+ Jam Tahan Lama</p>
                                <p class="text-[9px] text-stone-500 font-serif">Anti-crack & Sweatproof</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 2. FRESH LUXURY RIBBON MARQUEE --}}
    <div class="bg-stone-100/80 border-y border-stone-200/80 py-4 overflow-hidden select-none">
        <div class="flex items-center gap-8 whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.25em] font-bold text-stone-700">
                <span>✨ 12+ HOURS SWEATPROOF MAKEUP</span>
                <span class="text-rose-500">•</span>
                <span>ORIGINAL LUXURY PRODUCTS (DIOR, MAC, CT)</span>
                <span class="text-rose-500">•</span>
                <span>HOME SERVICE SELURUH SUMATERA BARAT</span>
                <span class="text-rose-500">•</span>
                <span>SKIN-FIRST HYPOALLERGENIC PREPARATION</span>
                <span class="text-rose-500">•</span>
                <span>FREE KONSULTASI MAKEUP LOOK</span>
                <span class="text-rose-500">•</span>
            </div>
            <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.25em] font-bold text-stone-700" aria-hidden="true">
                <span>✨ 12+ HOURS SWEATPROOF MAKEUP</span>
                <span class="text-rose-500">•</span>
                <span>ORIGINAL LUXURY PRODUCTS (DIOR, MAC, CT)</span>
                <span class="text-rose-500">•</span>
                <span>HOME SERVICE SELURUH SUMATERA BARAT</span>
                <span class="text-rose-500">•</span>
                <span>SKIN-FIRST HYPOALLERGENIC PREPARATION</span>
                <span class="text-rose-500">•</span>
                <span>FREE KONSULTASI MAKEUP LOOK</span>
                <span class="text-rose-500">•</span>
            </div>
        </div>
    </div>

    {{-- 3. SIGNATURE SERVICES SHOWCASE (CLEAN WARM CARDS) --}}
    <section id="services" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-700 font-bold block mb-3">Signature Packages</span>
                <h2 class="text-3xl sm:text-5xl font-serif text-stone-900 italic leading-tight">Pilihan Paket Riasan</h2>
                <div class="w-12 h-0.5 bg-rose-300 mx-auto mt-4 rounded-full"></div>
                <p class="text-stone-500 font-serif italic text-sm mt-4">
                    Dirancang dengan formula produk bertaraf internasional untuk memastikan riasan tetap segar dan berkilau di momen istimewa Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                @forelse($services as $service)
                    <div class="reveal-on-scroll reveal-delay-{{ $loop->iteration }} bg-[#faf9f7] rounded-[2.5rem] p-8 md:p-10 border border-stone-200/80 shadow-[0_10px_30px_rgba(0,0,0,0.02)] flex flex-col justify-between hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 relative group">
                        @if(str_contains(strtolower($service->name), 'wedding'))
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-stone-900 text-white text-[9px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-md">
                                Paling Diminati ⭐
                            </div>
                        @endif

                        <div>
                            <span class="text-[9px] uppercase tracking-[0.25em] text-rose-700 font-bold block mb-3">Official Service</span>
                            <h3 class="text-2xl font-serif italic text-stone-900 mb-3">{{ $service->name }}</h3>
                            <div class="w-8 h-px bg-stone-300 mb-5"></div>

                            <div class="mb-6">
                                <span class="text-xs text-stone-400 font-medium">Mulai dari</span>
                                <p class="text-3xl font-mono font-bold text-stone-900 mt-1">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="text-stone-600 text-xs font-serif leading-relaxed space-y-2 mb-8">
                                @if($service->description)
                                    {!! nl2br(e($service->description)) !!}
                                @else
                                    <p>✨ Luxury Professional Makeup Kit</p>
                                    <p>✨ 12+ Jam Longlasting & Sweatproof</p>
                                    <p>✨ Home Service Seluruh Daerah Sumbar</p>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('user.booking.create', ['service_id' => $service->id]) }}"
                           class="w-full text-center bg-stone-900 text-white py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-rose-700 transition-all duration-300 shadow-md italic">
                            Booking Paket Ini
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-stone-400">
                        Memuat paket layanan...
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('user.layanan.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-900 hover:text-rose-700 transition">
                    <span>Lihat Rincian Seluruh Layanan & Fasilitas</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 4. INTERACTIVE BEFORE & AFTER TRANSFORMATION SLIDER --}}
    <section class="py-24 bg-[#f5f3ef] text-stone-900 overflow-hidden border-y border-stone-200/70">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center max-w-xl mx-auto mb-14 reveal-on-scroll">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-700 font-bold block mb-3">Interactive Reveal</span>
                <h2 class="text-3xl sm:text-5xl font-serif italic text-stone-900 leading-tight">The Glowing Finish</h2>
                <div class="w-12 h-0.5 bg-rose-300 mx-auto mt-4 rounded-full"></div>
                <p class="text-stone-500 text-sm font-serif italic mt-3">
                    Tarik slider interaktif di bawah untuk melihat perbedaan hasil riasan halus yang menyatu dengan kulit.
                </p>
            </div>

            {{-- Slider Box --}}
            <div x-data="{ position: 50 }" class="max-w-3xl mx-auto relative rounded-[2.5rem] overflow-hidden shadow-xl border-4 border-white select-none aspect-[4/5] sm:aspect-[16/10] bg-stone-100 reveal-on-scroll reveal-delay-1">
                {{-- After Image (Full Glam Look) --}}
                <img src="{{ asset('assets/images/wedding-1.jpg') }}"
                     alt="After Glam Look"
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute bottom-5 right-5 bg-stone-900/80 backdrop-blur-md px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-white">
                    After: Glam Glowing Look ✨
                </div>

                {{-- Before Image (Clipped) --}}
                <div class="absolute inset-0 overflow-hidden"
                     :style="`width: ${position}%`">
                    <img src="{{ asset('assets/images/grad-1.jpg') }}"
                         alt="Fresh Look"
                         class="absolute inset-0 w-full h-full object-cover max-w-none"
                         style="width: 100%; height: 100%;">
                    <div class="absolute bottom-5 left-5 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-stone-900">
                        Fresh Soft Look 🌿
                    </div>
                </div>

                {{-- Divider Line & Handle --}}
                <div class="absolute top-0 bottom-0 w-1 bg-white shadow-[0_0_12px_rgba(0,0,0,0.3)] pointer-events-none"
                     :style="`left: ${position}%`">
                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-9 h-9 rounded-full bg-white text-stone-900 shadow-xl flex items-center justify-center font-bold text-xs border border-stone-200">
                        <i data-lucide="move-horizontal" class="w-3.5 h-3.5"></i>
                    </div>
                </div>

                {{-- Invisible Range Control --}}
                <input type="range"
                       min="5"
                       max="95"
                       x-model="position"
                       aria-label="Geser untuk melihat perbandingan before and after"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-20">
            </div>

            <p class="text-center text-xs text-stone-400 mt-4 font-serif italic">
                👆 Geser ke kiri atau kanan pada foto untuk melihat hasil riasan
            </p>
        </div>
    </section>

    {{-- 5. DAILY COLLECTION MARQUEE --}}
    @if($homepageSettings->collection_active)
        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 gap-6 reveal-on-scroll">
                    <div class="max-w-2xl">
                        <span class="text-[10px] tracking-[0.3em] uppercase text-rose-700 font-bold block mb-2">
                            {{ $homepageSettings->collection_badge }}
                        </span>
                        <h2 class="text-3xl sm:text-5xl font-serif text-stone-900 italic">
                            {{ $homepageSettings->collection_title }}
                        </h2>
                        @if($homepageSettings->collection_description)
                            <p class="text-stone-500 font-serif italic text-sm mt-4 leading-relaxed">
                                {{ $homepageSettings->collection_description }}
                            </p>
                        @endif
                    </div>
                    <a href="{{ route('user.katalog') }}"
                       class="shrink-0 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-900 hover:text-rose-700 transition">
                        <span>Lihat Semua Koleksi</span>
                        <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            @if($portfolios->isNotEmpty())
                <div class="border-y border-stone-200/70 bg-[#faf8f5] py-6">
                    <div class="overflow-hidden" aria-label="Koleksi portofolio yang bergerak otomatis">
                        <div class="portfolio-marquee"
                             style="animation-duration: {{ max(12, min(120, $homepageSettings->marquee_speed)) }}s">
                            @for($copy = 0; $copy < 2; $copy++)
                                <div class="flex gap-5 px-2" @if($copy === 1) aria-hidden="true" inert @endif>
                                    @foreach($portfolios as $portfolio)
                                        <a href="{{ route('user.katalog') }}"
                                           class="group relative block w-44 sm:w-56 md:w-64 aspect-[3/4] shrink-0 overflow-hidden rounded-[2rem] border-4 border-white bg-stone-100 shadow-sm transition-transform duration-500 hover:-translate-y-2 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                                            <img src="{{ $portfolio->image_url }}"
                                                 alt="{{ $portfolio->title }}"
                                                 loading="lazy"
                                                 class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-stone-950/85 via-stone-950/20 to-transparent p-4 pt-12 text-white">
                                                @if($portfolio->category)
                                                    <span class="block text-[8px] uppercase tracking-widest text-rose-200 font-bold">
                                                        {{ $portfolio->category->name }}
                                                    </span>
                                                @endif
                                                <p class="mt-1 line-clamp-1 text-[11px] font-serif font-bold italic">
                                                    {{ $portfolio->title }}
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-center gap-3 text-[9px] uppercase tracking-[0.25em] text-stone-400">
                    <span class="h-px w-8 bg-rose-200"></span>
                    <span>{{ $homepageSettings->marquee_text }}</span>
                    <span class="h-px w-8 bg-rose-200"></span>
                </div>
            @else
                <div class="mx-6 rounded-[2rem] border border-dashed border-stone-200 bg-stone-50 py-12 text-center text-sm italic text-stone-400">
                    Koleksi sedang disiapkan. Silakan pilih foto dari menu Portofolio di admin.
                </div>
            @endif
        </section>
    @endif

    {{-- 6. FOUNDER SPOTLIGHT --}}
    <section class="py-24 bg-[#faf8f5] border-t border-stone-200/70">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="relative">
                    <div class="absolute -inset-3 border-2 border-rose-200/80 rounded-[3rem] -z-10 rotate-1"></div>
                    <img src="{{ asset('assets/images/founder.jpg') }}"
                         class="rounded-[2.5rem] shadow-xl w-full aspect-[3/4] object-cover"
                         alt="Anis Ramdiah">
                </div>

                <div class="space-y-6 text-center md:text-left">
                    <span class="text-rose-700 font-bold uppercase tracking-[0.3em] text-[10px] block">Chief MUA & Founder</span>
                    <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic leading-tight">Anis Ramdiah</h2>

                    <p class="text-stone-600 leading-relaxed text-base md:text-lg italic border-l-0 md:border-l-4 border-rose-200 pl-0 md:pl-5 font-serif">
                        "Bagi saya, tata rias bukan tentang mengubah Anda menjadi orang lain, tetapi memancarkan pesona otentik dan rasa percaya diri terbaik Anda di momen paling sakral."
                    </p>

                    <div class="bg-white p-6 rounded-2xl border border-stone-200/80 shadow-sm flex items-center gap-4 text-left">
                        <div class="w-11 h-11 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="award" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs uppercase tracking-widest font-serif text-stone-900 italic">Sertifikasi Profesional MUA</h4>
                            <p class="text-xs text-stone-500 mt-0.5">Certified by Anggrid Natasha Makeup Academy</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('user.booking.create') }}"
                           class="inline-block bg-stone-900 text-white px-8 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:bg-rose-700 transition duration-300 shadow-md italic">
                            Booking Jadwal Bersama Saya ✨
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. GEN Z LOVE NOTES (TESTIMONIALS) --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-xl mx-auto mb-16">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-700 font-bold block mb-2">Real Love Notes</span>
                <h2 class="text-3xl sm:text-5xl font-serif text-stone-900 italic">Cerita Pengantin & Wisudawati</h2>
                <div class="flex items-center justify-center gap-1 text-amber-500 mt-4">
                    @for($s = 0; $s < 5; $s++)
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                    @endfor
                    <span class="text-xs text-stone-500 font-semibold ml-2">4.9 / 5.0 Rating</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#faf9f7] p-8 rounded-3xl border border-stone-200/70 flex flex-col justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 reveal-on-scroll">
                    <div>
                        <div class="flex text-amber-500 mb-4">
                            @for($s = 0; $s < 5; $s++)
                                <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-stone-700 text-sm font-serif italic leading-relaxed mb-6">
                            "Makeup wisuda ter-flawless! Dari jam 6 pagi sampe sore gak geser sama sekali walaupun kena keringat. Foto wisudaku bener-bener estetik tanpa perlu diedit lagi!"
                        </p>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-stone-900">Sarah Amanda</p>
                        <p class="text-[10px] text-rose-700 font-semibold uppercase tracking-wider">Wisuda Universitas Andalas (Unand)</p>
                    </div>
                </div>

                <div class="bg-[#faf9f7] p-8 rounded-3xl border border-stone-200/70 flex flex-col justify-between relative shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300 reveal-on-scroll reveal-delay-1">
                    <span class="absolute top-6 right-6 text-xl">👰</span>
                    <div>
                        <div class="flex text-amber-500 mb-4">
                            @for($s = 0; $s < 5; $s++)
                                <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-stone-700 text-sm font-serif italic leading-relaxed mb-6">
                            "Resepsi di Pangeran Beach Hotel Padang, semua keluarga dan tamu muji look-nya fresh banget. Gak dempul tapi super manglingi. Kak Anis juga sabar dan ramah pol!"
                        </p>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-stone-900">Dinda Pratama</p>
                        <p class="text-[10px] text-rose-700 font-semibold uppercase tracking-wider">Wedding Client • Padang</p>
                    </div>
                </div>

                <div class="bg-[#faf9f7] p-8 rounded-3xl border border-stone-200/70 flex flex-col justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 reveal-on-scroll reveal-delay-2">
                    <div>
                        <div class="flex text-amber-500 mb-4">
                            @for($s = 0; $s < 5; $s++)
                                <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-stone-700 text-sm font-serif italic leading-relaxed mb-6">
                            "Sumpah worth it banget! Riasan bridesmaid tahan seharian, kulit sensitifku aman gak beruntusan karena skin-prep-nya detail dan higienis banget."
                        </p>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-stone-900">Tiara Putri</p>
                        <p class="text-[10px] text-rose-700 font-semibold uppercase tracking-wider">Special Occasion / Bridesmaid</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 8. INTERACTIVE FAQ ACCORDION --}}
    <section class="py-24 bg-[#faf8f5] border-t border-stone-200/70" x-data="{ openFaq: null }">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-700 font-bold block mb-2">Got Questions?</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-stone-900 italic">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-stone-200/80 overflow-hidden shadow-sm">
                    <button @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Apakah Glam By Ramdiah melayani Home Service ke luar Kota Padang?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 1 }"></i>
                    </button>
                    <div x-show="openFaq === 1" x-transition class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Ya, kami melayani Home Service untuk seluruh wilayah Sumatera Barat, termasuk Pariaman, Bukittinggi, Agam, Payakumbuh, Pasaman, dan Solok. Untuk luar kota Padang dikenakan biaya transportasi sesuai jarak lokasi.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200/80 overflow-hidden shadow-sm">
                    <button @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Berapa lama sebelum hari H saya harus melakukan booking?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 2 }"></i>
                    </button>
                    <div x-show="openFaq === 2" x-transition class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Untuk acara Wedding, kami sangat menyarankan booking minimal 1 hingga 3 bulan sebelumnya karena slot akhir pekan cepat terisi. Untuk wisuda atau photoshoot, booking minimal 1-2 minggu sebelum hari H.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200/80 overflow-hidden shadow-sm">
                    <button @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Produk makeup apa saja yang digunakan?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 3 }"></i>
                    </button>
                    <div x-show="openFaq === 3" x-transition class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Kami hanya menggunakan produk original bertaraf internasional dan aman untuk kulit sensitif seperti Dior, Charlotte Tilbury, MAC, Anastasia Beverly Hills, Make Up For Ever, dan skin-prep berkualitas medis.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200/80 overflow-hidden shadow-sm">
                    <button @click="openFaq = (openFaq === 4 ? null : 4)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Bagaimana sistem pembayaran dan pengiriman Invoice?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 4 }"></i>
                    </button>
                    <div x-show="openFaq === 4" x-transition class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Setelah mengisi formulir booking online, Anda akan diarahkan ke WhatsApp admin untuk konfirmasi pembayaran DP via transfer bank (BCA/Mandiri). Setelah dikonfirmasi, Anda dapat mengunduh Invoice resmi berformat PDF langsung di menu "Pesanan Saya".
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 9. CLOSING VIP CTA BANNER --}}
    <section class="py-20 bg-stone-900 text-white text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <span class="text-[10px] tracking-[0.35em] uppercase text-rose-300 font-bold block mb-3">Slot Terbatas Setiap Akhir Pekan</span>
            <h2 class="text-3xl sm:text-5xl font-serif italic mb-5 leading-tight">
                Kunci Tanggal Acara Anda Sekarang
            </h2>
            <p class="text-stone-300 text-sm max-w-xl mx-auto mb-8 font-serif italic leading-relaxed">
                Jadwal pernikahan dan wisuda di Sumatera Barat cepat terisi. Konsultasikan look impian Anda sekarang bersama kami.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('user.booking.create') }}"
                   class="w-full sm:w-auto bg-rose-700 hover:bg-rose-800 text-white px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest transition-all shadow-xl italic">
                    Booking Jadwal Acara ✨
                </a>
                <a href="https://wa.me/{{ config('app.admin_whatsapp', '628123456789') }}?text={{ urlencode('Halo Kak Anis Glam By Ramdiah, saya ingin konsultasi jadwal MUA untuk tanggal acara saya.') }}"
                   target="_blank"
                   class="w-full sm:w-auto bg-white/10 border border-white/20 text-white px-8 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:bg-white hover:text-stone-900 transition-all italic flex items-center justify-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Tanya Ketersediaan via WA</span>
                </a>
            </div>
        </div>
    </section>

    {{-- 10. LUXURY FOOTER --}}
    <footer class="bg-stone-950 text-stone-400 py-16 text-xs font-serif border-t border-stone-800">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logo1.png') }}" class="h-8 w-auto filter invert opacity-90" alt="Logo">
                    <span class="font-serif italic text-lg text-white font-bold tracking-wider">Glam By Ramdiah</span>
                </div>
                <p class="text-stone-400 max-w-sm text-xs leading-relaxed">
                    Jasa rias pengantin, wisuda, dan momen spesial profesional dengan komitmen menghadirkan sentuhan mewah yang tahan lama dan elegan.
                </p>
                <p class="text-[10px] text-stone-500 uppercase tracking-widest">
                    📍 Padang, Sumatera Barat • Melayani Seluruh Wilayah Sumbar
                </p>
            </div>

            <div class="space-y-3">
                <h4 class="text-white font-bold uppercase text-[10px] tracking-widest">Navigasi Utama</h4>
                <ul class="space-y-2 text-stone-400">
                    <li><a href="{{ route('user.home') }}" class="hover:text-rose-400 transition">Beranda</a></li>
                    <li><a href="{{ route('user.katalog') }}" class="hover:text-rose-400 transition">Katalog Makeup</a></li>
                    <li><a href="{{ route('user.layanan.index') }}" class="hover:text-rose-400 transition">Paket & Harga</a></li>
                    <li><a href="{{ route('user.booking.create') }}" class="hover:text-rose-400 transition">Booking Jadwal</a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-white font-bold uppercase text-[10px] tracking-widest">Hubungi Kami</h4>
                <ul class="space-y-2 text-stone-400">
                    <li>WhatsApp: <a href="https://wa.me/{{ config('app.admin_whatsapp', '628123456789') }}" target="_blank" class="hover:text-rose-400 text-stone-300 font-mono">+{{ config('app.admin_whatsapp', '628123456789') }}</a></li>
                    <li>Instagram: <span class="text-stone-300">@glambyramdiah</span></li>
                    <li>Jam Operasional: 07.00 - 21.00 WIB</li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 pt-12 mt-12 border-t border-stone-800 text-center text-stone-500 text-[10px] uppercase tracking-widest">
            &copy; {{ date('Y') }} Glam By Ramdiah • Timeless Beauty, Elegant Look. All rights reserved.
        </div>
    </footer>
</x-app-layout>
