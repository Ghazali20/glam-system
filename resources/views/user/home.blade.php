<x-app-layout>
    {{-- 1. HERO SECTION DENGAN TEMA MODERN EDITORIAL GLAMOUR --}}
    <section class="bg-[#0f0e0c] min-h-[calc(100vh-64px)] flex items-center justify-center text-center relative overflow-hidden pt-12 pb-20">
        {{-- Ambient Mesh Glow Background --}}
        <div class="absolute inset-0 pointer-events-none opacity-25">
            <div class="absolute top-[-15%] left-[-10%] w-[50%] h-[50%] bg-rose-500 rounded-full blur-[140px] animate-pulse"></div>
            <div class="absolute bottom-[-15%] right-[-10%] w-[50%] h-[50%] bg-amber-600/30 rounded-full blur-[160px]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[40%] h-[40%] bg-stone-700/20 rounded-full blur-[130px]"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 max-w-5xl">
            {{-- Floating Badge Status --}}
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-8">
                <span class="w-2 h-2 rounded-full bg-rose-400 animate-ping"></span>
                <span class="text-[10px] tracking-[0.35em] uppercase text-stone-300 font-semibold">
                    MUA Wedding & Graduation Specialist • Padang & Sumbar
                </span>
            </div>

            {{-- Judul Utama Editorial --}}
            <h1 class="text-5xl sm:text-7xl md:text-9xl font-serif text-white mb-6 leading-[1.05] tracking-tight">
                Modern <br>
                <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-rose-200 via-rose-300 to-amber-200 font-normal">
                    Glamour.
                </span>
            </h1>

            <p class="text-stone-300 text-sm sm:text-base md:text-lg max-w-2xl mx-auto mb-10 font-serif italic leading-relaxed">
                Riasan mewah, tahan 12+ jam tanpa crack, dengan sentuhan flawless yang menonjolkan kecantikan otentik di setiap momen sakral Anda.
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-14">
                <a href="{{ route('user.booking.create') }}"
                   class="w-full sm:w-auto bg-gradient-to-r from-rose-600 to-rose-500 text-white px-10 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:scale-105 hover:shadow-[0_10px_35px_rgba(244,63,94,0.4)] transition-all duration-300 shadow-xl italic flex items-center justify-center gap-2">
                    <span>Pesan Jadwal MUA</span>
                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                </a>
                <a href="#services"
                   class="w-full sm:w-auto bg-white/5 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:bg-white hover:text-stone-900 transition-all duration-300">
                    Lihat Paket Layanan
                </a>
                <a href="{{ route('user.katalog') }}"
                   class="w-full sm:w-auto border border-white/20 text-stone-300 px-8 py-4 rounded-full text-xs uppercase tracking-widest font-bold hover:text-white hover:border-white/40 transition-all duration-300">
                    Katalog Portofolio
                </a>
            </div>

            {{-- Key Metrics Social Proof --}}
            <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto pt-8 border-t border-white/10 text-stone-400">
                <div>
                    <p class="text-xl sm:text-2xl font-serif font-bold text-white">500+</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1 text-stone-400">Brides & Graduates</p>
                </div>
                <div>
                    <p class="text-xl sm:text-2xl font-serif font-bold text-white">12+ Jam</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1 text-stone-400">Sweatproof Look</p>
                </div>
                <div>
                    <p class="text-xl sm:text-2xl font-serif font-bold text-white">★ 4.9 / 5</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1 text-stone-400">Client Reviews</p>
                </div>
            </div>
        </div>

        {{-- Scroll Down Anchor Indicator --}}
        <a href="#explore" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40 hover:opacity-100 transition-opacity">
            <span class="text-[8px] uppercase tracking-[0.3em] text-white">Scroll to Explore</span>
            <div class="w-px h-8 bg-gradient-to-b from-white to-transparent animate-bounce"></div>
        </a>
    </section>

    {{-- 2. ANIMATED MARQUEE TICKER (LUXURY VIBE UNTUK GEN Z) --}}
    <div id="explore" class="bg-rose-950/40 border-y border-rose-900/30 py-4 overflow-hidden select-none">
        <div class="flex items-center gap-8 whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.25em] font-semibold text-rose-200">
                <span>✨ 12+ HOURS SWEATPROOF MAKEUP</span>
                <span class="text-rose-500">•</span>
                <span>HIGH-END SKIN PREPARATION</span>
                <span class="text-rose-500">•</span>
                <span>ORIGINAL LUXURY PRODUCTS (DIOR, MAC, CT)</span>
                <span class="text-rose-500">•</span>
                <span>HOME SERVICE SELURUH SUMATERA BARAT</span>
                <span class="text-rose-500">•</span>
                <span>FLAWLESS & ANTI-CRACK GUARANTEED</span>
                <span class="text-rose-500">•</span>
                <span>FREE KONSULTASI MAKEUP LOOK</span>
                <span class="text-rose-500">•</span>
            </div>
            <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.25em] font-semibold text-rose-200" aria-hidden="true">
                <span>✨ 12+ HOURS SWEATPROOF MAKEUP</span>
                <span class="text-rose-500">•</span>
                <span>HIGH-END SKIN PREPARATION</span>
                <span class="text-rose-500">•</span>
                <span>ORIGINAL LUXURY PRODUCTS (DIOR, MAC, CT)</span>
                <span class="text-rose-500">•</span>
                <span>HOME SERVICE SELURUH SUMATERA BARAT</span>
                <span class="text-rose-500">•</span>
                <span>FLAWLESS & ANTI-CRACK GUARANTEED</span>
                <span class="text-rose-500">•</span>
                <span>FREE KONSULTASI MAKEUP LOOK</span>
                <span class="text-rose-500">•</span>
            </div>
        </div>
    </div>

    {{-- 3. SIGNATURE SERVICES SHOWCASE --}}
    <section id="services" class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-600 font-bold block mb-3">Signature Packages</span>
                <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic leading-tight">Pilihan Paket Layanan</h2>
                <div class="w-16 h-1 bg-rose-200 mx-auto mt-4 rounded-full"></div>
                <p class="text-stone-600 font-serif italic text-sm mt-4">
                    Setiap paket telah dirancang khusus dengan produk kelas premium untuk menjamin hasil riasan yang tahan lama, cerah, dan menawan di kamera maupun pandangan mata langsung.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                @forelse($services as $service)
                    <div class="bg-white rounded-[3rem] p-8 md:p-10 border border-stone-200/70 shadow-[0_15px_40px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative group">
                        @if(str_contains(strtolower($service->name), 'wedding'))
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-rose-600 to-rose-500 text-white text-[9px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-md">
                                Most Popular ⭐
                            </div>
                        @endif

                        <div>
                            <span class="text-[9px] uppercase tracking-[0.25em] text-rose-500 font-bold block mb-3">Official Glam Package</span>
                            <h3 class="text-2xl font-serif italic text-stone-900 mb-4">{{ $service->name }}</h3>
                            <div class="w-10 h-px bg-stone-200 mb-6"></div>

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
                           class="w-full text-center bg-stone-900 text-white py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-rose-600 transition-all duration-300 shadow-md italic">
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
                <a href="{{ route('user.layanan.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-rose-600 hover:text-stone-900 transition">
                    <span>Lihat Rincian Seluruh Layanan & Fasilitas</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 4. INTERACTIVE BEFORE & AFTER TRANSFORMATION SLIDER (WOW FACTOR GEN Z) --}}
    <section class="py-24 bg-[#12100e] text-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-400 font-bold block mb-3">Transformation Reveal</span>
                <h2 class="text-4xl md:text-5xl font-serif italic text-white leading-tight">The Flawless Touch</h2>
                <div class="w-16 h-1 bg-rose-500/40 mx-auto mt-4 rounded-full"></div>
                <p class="text-stone-400 text-sm font-serif italic mt-4">
                    Geser slider di bawah ini untuk melihat perbandingan tekstur makeup yang menyatu natural dengan kulit tanpa efek dempul berlebih.
                </p>
            </div>

            {{-- Slider Container --}}
            <div x-data="{ position: 50 }" class="max-w-3xl mx-auto relative rounded-[3rem] overflow-hidden shadow-2xl border border-white/10 select-none aspect-[4/5] sm:aspect-[16/10]">
                {{-- Gambar "AFTER" (Lapisan Bawah: Full Glam Glow) --}}
                <img src="{{ asset('assets/images/wedding-1.jpg') }}"
                     alt="After Glam Look"
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute bottom-6 right-6 bg-black/60 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest text-rose-300 border border-white/10">
                    After: Glam Glowing Look ✨
                </div>

                {{-- Gambar "BEFORE" (Lapisan Atas: Di-clip sesuai persentase slider) --}}
                <div class="absolute inset-0 overflow-hidden"
                     :style="`width: ${position}%`">
                    <img src="{{ asset('assets/images/grad-1.jpg') }}"
                         alt="Fresh Look"
                         class="absolute inset-0 w-full h-full object-cover max-w-none"
                         style="width: 100%; height: 100%;">
                    <div class="absolute bottom-6 left-6 bg-black/60 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest text-stone-300 border border-white/10">
                        Fresh Soft Look 🌿
                    </div>
                </div>

                {{-- Garis Pembagi & Handle Slider --}}
                <div class="absolute top-0 bottom-0 w-1 bg-white shadow-[0_0_15px_rgba(255,255,255,0.7)] pointer-events-none"
                     :style="`left: ${position}%`">
                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full bg-white text-stone-900 shadow-2xl flex items-center justify-center font-bold text-xs border-2 border-rose-500">
                        <i data-lucide="move-horizontal" class="w-4 h-4"></i>
                    </div>
                </div>

                {{-- Range Input Tak Kasat Mata untuk Kontrol Drag / Touch --}}
                <input type="range"
                       min="5"
                       max="95"
                       x-model="position"
                       aria-label="Geser untuk melihat perbandingan before and after makeup"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-20">
            </div>

            <p class="text-center text-xs text-stone-400 mt-6 font-serif italic">
                👆 Seret ke kiri atau kanan pada gambar untuk melihat transformasi
            </p>
        </div>
    </section>

    {{-- 5. CURATED LOOKBOOK EDITORIAL PEEK --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-16 gap-6">
                <div>
                    <span class="text-[10px] tracking-[0.3em] uppercase text-rose-600 font-bold block mb-2">Curated Lookbook</span>
                    <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic">Koleksi Look Terbaru</h2>
                </div>
                <a href="{{ route('user.katalog') }}"
                   class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-900 hover:text-rose-600 transition">
                    <span>Buka Seluruh 16+ Koleksi Katalog</span>
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @forelse($portfolios as $portfolio)
                    <a href="{{ route('user.katalog') }}"
                       class="group relative aspect-[3/4] rounded-3xl overflow-hidden shadow-sm border border-stone-100 bg-stone-100 block">
                        <img src="{{ $portfolio->image_url }}"
                             alt="{{ $portfolio->title }}"
                             loading="lazy"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4 text-white">
                            <span class="text-[8px] uppercase tracking-widest text-rose-300 font-bold">{{ $portfolio->category?->name }}</span>
                            <p class="text-[11px] font-serif font-bold italic line-clamp-1">{{ $portfolio->title }}</p>
                        </div>
                    </a>
                @empty
                    @for($i = 1; $i <= 6; $i++)
                        <div class="aspect-[3/4] rounded-3xl overflow-hidden bg-stone-100">
                            <img src="{{ asset("assets/images/wedding-$i.jpg") }}" alt="Look {{ $i }}" class="w-full h-full object-cover">
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    {{-- 6. FOUNDER SPOTLIGHT --}}
    <section class="py-24 bg-stone-50 border-t border-stone-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 md:gap-20 items-center">
                <div class="relative">
                    <div class="absolute -inset-4 border-2 border-rose-200 rounded-[3.5rem] -z-10 rotate-2"></div>
                    <img src="{{ asset('assets/images/founder.jpg') }}"
                         class="rounded-[3rem] shadow-2xl w-full aspect-[3/4] object-cover"
                         alt="Anis Ramdiah">
                </div>

                <div class="space-y-6 text-center md:text-left">
                    <span class="text-rose-500 font-bold uppercase tracking-[0.3em] text-[10px] block">Chief MUA & Founder</span>
                    <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic leading-tight">Anis Ramdiah</h2>

                    <p class="text-stone-600 leading-relaxed text-base md:text-lg italic border-l-0 md:border-l-4 border-rose-200 pl-0 md:pl-6 font-serif">
                        "Bagi saya, makeup bukan untuk mengubah Anda menjadi orang lain, melainkan menonjolkan kecantikan otentik dan rasa percaya diri tertinggi Anda di momen paling sakral."
                    </p>

                    <div class="bg-white p-6 rounded-[2rem] border border-stone-200 shadow-sm flex items-center gap-4 text-left">
                        <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="award" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs uppercase tracking-widest font-serif text-rose-950 italic">Sertifikasi Profesional MUA</h4>
                            <p class="text-xs text-stone-500 mt-0.5">Certified by Anggrid Natasha Makeup Academy</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('user.booking.create') }}"
                           class="inline-block bg-stone-900 text-white px-8 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:bg-rose-600 transition duration-300 shadow-lg italic">
                            Booking Langsung Bersama Saya ✨
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. GEN Z LOVE NOTES / TESTIMONIALS --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-xl mx-auto mb-16">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-600 font-bold block mb-2">Real Love Notes</span>
                <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic">Kata Mereka yang Sudah Tampil Glam</h2>
                <div class="flex items-center justify-center gap-1 text-amber-400 mt-4">
                    @for($s = 0; $s < 5; $s++)
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    @endfor
                    <span class="text-xs text-stone-500 font-semibold ml-2">4.9 / 5.0 Rating</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-stone-50 p-8 rounded-[2.5rem] border border-stone-100 flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 mb-4">
                            @for($s = 0; $s < 5; $s++)
                                <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-stone-700 text-sm font-serif italic leading-relaxed mb-6">
                            "Makeup wisuda ter-flawless! Dari jam 6 pagi sampe sore gak geser sama sekali walaupun kena keringat. Foto wisudaku bener-bener estetik parah tanpa perlu edit!"
                        </p>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-stone-900">Sarah Amanda</p>
                        <p class="text-[10px] text-rose-600 font-semibold uppercase tracking-wider">Wisuda Universitas Andalas (Unand)</p>
                    </div>
                </div>

                <div class="bg-stone-50 p-8 rounded-[2.5rem] border border-stone-100 flex flex-col justify-between relative shadow-sm">
                    <span class="absolute top-6 right-6 text-2xl">👰</span>
                    <div>
                        <div class="flex text-amber-400 mb-4">
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
                        <p class="text-[10px] text-rose-600 font-semibold uppercase tracking-wider">Wedding Client • Padang</p>
                    </div>
                </div>

                <div class="bg-stone-50 p-8 rounded-[2.5rem] border border-stone-100 flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 mb-4">
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
                        <p class="text-[10px] text-rose-600 font-semibold uppercase tracking-wider">Special Occasion / Bridesmaid</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 8. INTERACTIVE FAQ ACCORDION --}}
    <section class="py-24 bg-stone-50 border-t border-stone-100" x-data="{ openFaq: null }">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-[10px] tracking-[0.3em] uppercase text-rose-600 font-bold block mb-2">Got Questions?</span>
                <h2 class="text-4xl font-serif text-stone-900 italic">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden">
                    <button @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Apakah Glam By Ramdiah melayani Home Service ke luar Kota Padang?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 1 }"></i>
                    </button>
                    <div x-show="openFaq === 1" x-collapse class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Ya, kami melayani Home Service untuk seluruh wilayah Sumatera Barat, termasuk Pariaman, Bukittinggi, Agam, Payakumbuh, Pasaman, dan Solok. Untuk luar kota Padang dikenakan biaya transportasi sesuai jarak lokasi.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden">
                    <button @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Berapa lama sebelum hari H saya harus melakukan booking?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 2 }"></i>
                    </button>
                    <div x-show="openFaq === 2" x-collapse class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Untuk acara Wedding, kami sangat menyarankan booking minimal 1 hingga 3 bulan sebelumnya karena slot akhir pekan cepat terisi. Untuk wisuda atau photoshoot, booking minimal 1-2 minggu sebelum hari H.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden">
                    <button @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Produk makeup apa saja yang digunakan?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 3 }"></i>
                    </button>
                    <div x-show="openFaq === 3" x-collapse class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Kami hanya menggunakan produk original bertaraf internasional dan aman untuk kulit sensitif seperti Dior, Charlotte Tilbury, MAC, Anastasia Beverly Hills, Make Up For Ever, dan brand skin-prep berkualitas medis.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden">
                    <button @click="openFaq = (openFaq === 4 ? null : 4)"
                            class="w-full px-6 py-5 text-left font-serif font-bold text-sm text-stone-900 flex justify-between items-center">
                        <span>Bagaimana sistem pembayaran dan pengiriman Invoice?</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 4 }"></i>
                    </button>
                    <div x-show="openFaq === 4" x-collapse class="px-6 pb-5 text-xs text-stone-600 font-serif leading-relaxed">
                        Setelah mengisi formulir booking online, Anda akan diarahkan ke WhatsApp admin untuk konfirmasi pembayaran DP via transfer bank (BCA/Mandiri). Setelah dikonfirmasi, Anda dapat mengunduh Invoice resmi berformat PDF langsung di menu "Pesanan Saya".
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 9. HIGH-CONVERTING CLOSING VIP CTA --}}
    <section class="py-20 bg-[#0f0e0c] text-white text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <span class="text-[10px] tracking-[0.4em] uppercase text-rose-400 font-bold block mb-3">Limited Slots Only</span>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-serif italic mb-6 leading-tight">
                Kunci Jadwal Anda Sekarang
            </h2>
            <p class="text-stone-300 text-sm max-w-xl mx-auto mb-10 font-serif italic leading-relaxed">
                Slot tanggal terbaik setiap akhir pekan sangat terbatas. Jangan sampai tanggal sakral Anda terisi oleh klien lain.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('user.booking.create') }}"
                   class="w-full sm:w-auto bg-gradient-to-r from-rose-600 to-rose-500 text-white px-12 py-4 rounded-full font-bold uppercase text-[10px] tracking-widest hover:scale-105 transition-all shadow-2xl italic">
                    Amankan Tanggal Acara ✨
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
    <footer class="bg-[#080706] text-stone-400 border-t border-white/5 py-16 text-xs font-serif">
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

        <div class="max-w-7xl mx-auto px-6 pt-12 mt-12 border-t border-white/5 text-center text-stone-500 text-[10px] uppercase tracking-widest">
            &copy; {{ date('Y') }} Glam By Ramdiah • Timeless Beauty, Elegant Look. All rights reserved.
        </div>
    </footer>
</x-app-layout>
