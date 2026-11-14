<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif italic text-3xl text-stone-900 leading-tight">
            {{ __('Daftar Layanan Jasa') }}
        </h2>
        <p class="text-stone-500 text-sm font-serif">Pilih paket terbaik untuk momen spesial Anda</p>
    </x-slot>

    <div class="py-12 bg-stone-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.02)] border border-stone-100 transition-all hover:shadow-2xl hover:-translate-y-2 group">

                        <div class="p-8 md:p-10 text-center">
                            <label class="text-[10px] uppercase tracking-[0.3em] text-pink-500 font-bold block mb-4">Official Service</label>
                            <h3 class="text-2xl font-serif italic text-stone-900 mb-4">{{ $service->name }}</h3>

                            <div class="w-12 h-[1px] bg-stone-200 mx-auto mb-6"></div>

                            <div class="mb-6">
                                <span class="text-sm text-stone-400 font-medium">Mulai dari</span>
                                <p class="text-3xl font-mono font-bold text-stone-900 mt-1">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </p>
                            </div>

                            {{-- PERBAIKAN DI SINI: Memanggil deskripsi dari database --}}
                            <div class="text-stone-500 text-sm mb-10 font-serif italic leading-relaxed">
                                @if($service->description)
                                    {!! nl2br(e($service->description)) !!}
                                @else
                                    <ul class="space-y-2">
                                        <li>✨ Profesional Makeup Kit</li>
                                        <li>✨ High Quality Products</li>
                                        <li>✨ Home Service Available</li>
                                    </ul>
                                @endif
                            </div>

                            <a href="{{ route('user.booking.create', ['service_id' => $service->id]) }}"
                               class="inline-block w-full bg-stone-900 text-white py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] transition-all hover:bg-pink-600 shadow-lg italic">
                                Booking Paket Ini
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-20 text-center">
                <p class="text-stone-400 text-xs italic tracking-widest uppercase">
                    Glam By Ramdiah &copy; 2025 • Timeless Beauty, Elegant Look
                </p>
            </div>
        </div>
    </div>
</x-app-layout>