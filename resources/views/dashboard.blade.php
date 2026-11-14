<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif italic text-2xl text-stone-900 leading-tight">
            {{ __('Profil Glam By Ramdiah') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-center">
                <div class="relative order-2 md:order-1">
                    <div class="absolute -inset-4 border border-pink-100 rounded-[3rem] -z-10 rotate-3"></div>
                    <img src="{{ asset('assets/images/founder.jpg') }}"
                         class="rounded-[2.5rem] shadow-2xl w-full aspect-[3/4] object-cover"
                         alt="Anis Ramdiah">
                </div>

                <div class="space-y-6 text-center md:text-left order-1 md:order-2">
                    <span class="text-pink-500 font-bold uppercase tracking-widest text-xs block">Chief MUA & Founder</span>
                    <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic leading-tight">Anis Ramdiah</h2>

                    <p class="text-gray-600 leading-relaxed text-lg italic border-l-0 md:border-l-4 border-pink-100 pl-0 md:pl-6">
                        "Make-up terbaik adalah yang membuat Anda merasa paling percaya diri dan cantik alami."
                    </p>

                    <div class="bg-stone-50 p-6 md:p-8 rounded-[2rem] border border-stone-100 shadow-sm w-full block text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <i data-lucide="award" class="text-pink-600 w-5 h-5 flex-shrink-0"></i>
                            <h4 class="font-bold text-xs uppercase tracking-widest font-serif text-pink-900 italic">Sertifikasi Profesional</h4>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Profesional Make-Up Artis Certified by Anggrid Nathasa
                        </p>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('user.booking.create') }}"
                           class="inline-block bg-black text-white px-10 py-4 rounded-xl font-bold uppercase text-[10px] tracking-widest hover:bg-pink-600 transition duration-300 shadow-lg italic">
                            Booking Jasa Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>