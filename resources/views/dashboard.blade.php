<x-app-layout>
    <div class="py-20 bg-[#faf8f5] min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Label --}}
            <div class="text-center mb-16">
                <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-2">The Artist</span>
                <h1 class="text-4xl md:text-5xl font-serif italic text-stone-900 leading-tight">Tentang Founder</h1>
            </div>

            <div class="grid md:grid-cols-2 gap-12 md:gap-20 items-center">

                {{-- Foto Founder --}}
                <div class="relative order-2 md:order-1">
                    <div class="absolute -inset-5 border border-stone-200/60 rounded-[3rem] -z-10 rotate-2"></div>
                    <div class="absolute -inset-5 border border-rose-100/50 rounded-[3rem] -z-10 -rotate-1"></div>
                    <img src="{{ asset('assets/images/founder.jpg') }}"
                         class="rounded-[2.5rem] shadow-[0_30px_80px_rgba(0,0,0,0.08)] w-full aspect-[3/4] object-cover"
                         alt="Anis Ramdiah">
                    {{-- Floating badge --}}
                    <div class="absolute -bottom-5 -right-5 bg-white rounded-2xl px-5 py-3 shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-stone-100">
                        <p class="text-[9px] uppercase tracking-widest text-stone-400 font-bold">Certified</p>
                        <p class="text-sm font-serif italic text-stone-800">Professional MUA</p>
                    </div>
                </div>

                {{-- Konten --}}
                <div class="space-y-8 order-1 md:order-2">
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-3">Chief MUA & Founder</span>
                        <h2 class="text-4xl md:text-5xl font-serif text-stone-900 italic leading-tight mb-6">Anis Ramdiah</h2>
                        <p class="text-stone-600 leading-relaxed text-lg italic border-l-4 border-rose-100 pl-6">
                            "Make-up terbaik adalah yang membuat Anda merasa paling percaya diri dan cantik alami."
                        </p>
                    </div>

                    <p class="text-stone-500 leading-relaxed">
                        Dengan pengalaman bertahun-tahun di industri kecantikan Sumatera Barat, Anis Ramdiah telah membantu ratusan wanita tampil percaya diri di momen paling berkesan mereka — dari pernikahan adat Minang hingga wisuda dan pemotretan profesional.
                    </p>

                    {{-- Sertifikasi --}}
                    <div class="bg-white p-6 md:p-8 rounded-[2rem] border border-stone-200/70 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                        <div class="flex items-center gap-3 mb-3">
                            <i data-lucide="award" class="text-rose-700 w-5 h-5 flex-shrink-0"></i>
                            <h4 class="font-bold text-xs uppercase tracking-widest text-stone-700">Sertifikasi Profesional</h4>
                        </div>
                        <p class="text-sm text-stone-500 leading-relaxed">
                            Profesional Make-Up Artis Certified by Anggrid Nathasa — standar tertinggi dalam industri kecantikan Indonesia.
                        </p>
                    </div>

                    {{-- Stats --}}
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-white rounded-2xl border border-stone-200/60">
                            <p class="text-2xl font-serif italic text-stone-900 font-bold">200+</p>
                            <p class="text-[9px] uppercase tracking-widest text-stone-400 mt-1">Klien Puas</p>
                        </div>
                        <div class="text-center p-4 bg-white rounded-2xl border border-stone-200/60">
                            <p class="text-2xl font-serif italic text-stone-900 font-bold">5+</p>
                            <p class="text-[9px] uppercase tracking-widest text-stone-400 mt-1">Tahun Pengalaman</p>
                        </div>
                        <div class="text-center p-4 bg-white rounded-2xl border border-stone-200/60">
                            <p class="text-2xl font-serif italic text-stone-900 font-bold">4.9★</p>
                            <p class="text-[9px] uppercase tracking-widest text-stone-400 mt-1">Rating</p>
                        </div>
                    </div>

                    {{-- CTA --}}
                    <div class="pt-2">
                        <a href="{{ route('user.booking.create') }}"
                           class="inline-block bg-stone-900 text-white px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-[0.25em] hover:bg-rose-700 transition-all shadow-md italic">
                            Booking Jasa Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
