<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif italic text-2xl text-stone-900 leading-tight">
            {{ __('Katalog Makeup Look') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-stone-500 uppercase tracking-widest text-[10px] font-bold">Inspirasi Kecantikan dari Sentuhan Glam By Ramdiah</p>
                <div class="h-1 w-20 bg-pink-100 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                {{-- Loop 8 Wedding + 8 Grad = 16 Foto Portofolio dengan Lazy Loading --}}
                @for ($i = 1; $i <= 8; $i++)
                    <div class="group relative overflow-hidden rounded-[2rem] shadow-sm border border-gray-100 aspect-[3/4] bg-stone-100">
                        <img src="{{ asset("assets/images/wedding-$i.jpg") }}"
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                             alt="Wedding Look {{ $i }}"
                             loading="lazy"
                             decoding="async">
                    </div>

                    <div class="group relative overflow-hidden rounded-[2rem] shadow-sm border border-gray-100 aspect-[3/4] bg-stone-100">
                        <img src="{{ asset("assets/images/grad-$i.jpg") }}"
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                             alt="Graduation Look {{ $i }}"
                             loading="lazy"
                             decoding="async">
                    </div>
                @endfor
            </div>

            <div class="mt-16 text-center">
                <p class="text-stone-600 italic mb-6">Ingin tampil mempesona di hari spesial Anda?</p>
                <a href="{{ route('user.booking.create') }}"
                   class="inline-block bg-black text-white px-12 py-4 rounded-xl font-bold uppercase text-[10px] tracking-widest hover:bg-pink-600 transition duration-300 shadow-xl italic">
                    Booking Now
                </a>
            </div>
        </div>
    </div>
</x-app-layout>