<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-serif italic text-3xl text-stone-900 leading-tight">
                    {{ __('Daftar Paket Layanan MUA') }}
                </h2>
                <p class="text-stone-500 text-sm font-serif mt-1">Pilihan paket tata rias profesional eksklusif untuk momen sakral Anda</p>
            </div>
            <a href="{{ route('user.booking.create') }}"
               class="self-start md:self-auto bg-stone-900 text-white px-6 py-3 rounded-full text-[11px] font-bold uppercase tracking-widest hover:bg-rose-700 transition shadow-md italic">
                Booking Jadwal ✨
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-[#faf8f5] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                @foreach($services as $service)
                    <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-stone-200/80 shadow-[0_10px_30px_rgba(0,0,0,0.02)] flex flex-col justify-between hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 relative group">
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
                @endforeach
            </div>

            {{-- Jaminan Kualitas Layanan --}}
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="bg-white p-6 rounded-2xl border border-stone-200/70 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center mx-auto mb-3 font-bold">
                        <i data-lucide="sparkles" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-serif italic font-bold text-sm text-stone-900">Produk High-End Original</h4>
                    <p class="text-xs text-stone-500 font-serif mt-1">Hanya menggunakan Dior, MAC, Charlotte Tilbury & brand internasional teruji.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-stone-200/70 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center mx-auto mb-3 font-bold">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-serif italic font-bold text-sm text-stone-900">Skin-Prep Hypoallergenic</h4>
                    <p class="text-xs text-stone-500 font-serif mt-1">Aman untuk kulit sensitif, bebas jerawat dan bruntusan pasca-acara.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-stone-200/70 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center mx-auto mb-3 font-bold">
                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-serif italic font-bold text-sm text-stone-900">Home Service Seluruh Sumbar</h4>
                    <p class="text-xs text-stone-500 font-serif mt-1">Kami siap hadir langsung di kediaman, hotel, atau venue pernikahan Anda.</p>
                </div>
            </div>

            <div class="mt-16 text-center">
                <p class="text-stone-400 text-xs italic tracking-widest uppercase">
                    Glam By Ramdiah &copy; {{ date('Y') }} • Timeless Beauty, Elegant Look
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
