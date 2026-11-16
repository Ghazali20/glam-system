<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-stone-200/60 shadow-[0_2px_15px_rgba(0,0,0,0.02)] transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            {{-- Brand Logo --}}
            <div class="flex items-center gap-8">
                <a href="{{ route('user.home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('assets/images/logo1.png') }}" class="h-10 w-auto transition-transform duration-300 group-hover:scale-105" alt="Glam By Ramdiah">
                    <div class="flex flex-col">
                        <span class="font-serif italic font-bold text-lg text-stone-900 tracking-wider">Glam By Ramdiah</span>
                        <span class="text-[8px] uppercase tracking-[0.3em] text-rose-700 font-semibold">Luxury Bridal & MUA</span>
                    </div>
                </a>

                {{-- Desktop Navigation Links --}}
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2 ms-6">
                    <a href="{{ route('user.home') }}"
                       class="px-3.5 py-2 rounded-full text-xs font-semibold tracking-wider transition-all {{ request()->routeIs('user.home') ? 'text-stone-950 font-bold bg-stone-100' : 'text-stone-600 hover:text-stone-950 hover:bg-stone-50' }}">
                        Home
                    </a>

                    <a href="{{ route('user.katalog') }}"
                       class="px-3.5 py-2 rounded-full text-xs font-semibold tracking-wider transition-all {{ request()->routeIs('user.katalog') ? 'text-stone-950 font-bold bg-stone-100' : 'text-stone-600 hover:text-stone-950 hover:bg-stone-50' }}">
                        Katalog
                    </a>

                    <a href="{{ route('user.layanan.index') }}"
                       class="px-3.5 py-2 rounded-full text-xs font-semibold tracking-wider transition-all {{ request()->routeIs('user.layanan.index') ? 'text-stone-950 font-bold bg-stone-100' : 'text-stone-600 hover:text-stone-950 hover:bg-stone-50' }}">
                        Paket Layanan
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="px-3.5 py-2 rounded-full text-xs font-semibold tracking-wider transition-all {{ request()->routeIs('dashboard') ? 'text-stone-950 font-bold bg-stone-100' : 'text-stone-600 hover:text-stone-950 hover:bg-stone-50' }}">
                            Tentang Founder
                        </a>

                        <a href="{{ route('user.bookings.index') }}"
                           class="px-3.5 py-2 rounded-full text-xs font-semibold tracking-wider transition-all {{ request()->routeIs('user.bookings.index') ? 'text-stone-950 font-bold bg-stone-100' : 'text-stone-600 hover:text-stone-950 hover:bg-stone-50' }}">
                            Pesanan Saya
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Right Actions --}}
            <div class="hidden sm:flex sm:items-center sm:gap-4">
                <a href="{{ route('user.booking.create') }}"
                   class="bg-stone-900 text-white hover:bg-rose-700 px-6 py-2.5 rounded-full text-[11px] font-bold uppercase tracking-widest transition-all duration-300 shadow-sm hover:shadow-md flex items-center gap-2 italic">
                    <span>Booking Now</span>
                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                </a>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full text-xs font-semibold text-stone-700 bg-stone-50 hover:bg-stone-100 border border-stone-200/60 transition">
                                <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-[10px]">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                                <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-stone-400"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Edit Akun') }}</x-dropdown-link>
                            @if(Auth::user()->isAdmin())
                                <x-dropdown-link href="/admin" target="_blank">{{ __('Panel Admin') }}</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-3 pl-2">
                        <a href="{{ route('login') }}" class="text-xs font-semibold text-stone-600 hover:text-stone-900 transition px-2 py-1">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="text-xs font-bold text-rose-700 hover:text-rose-800 transition uppercase tracking-wider">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-full text-stone-600 hover:bg-stone-100 transition" aria-label="Toggle menu">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/98 border-t border-stone-100 px-6 py-6 space-y-3 font-serif">
        <a href="{{ route('user.home') }}" class="block text-sm font-semibold text-stone-800 hover:text-rose-700 py-2">Home</a>
        <a href="{{ route('user.katalog') }}" class="block text-sm font-semibold text-stone-800 hover:text-rose-700 py-2">Katalog</a>
        <a href="{{ route('user.layanan.index') }}" class="block text-sm font-semibold text-stone-800 hover:text-rose-700 py-2">Paket Layanan</a>

        @auth
            <a href="{{ route('dashboard') }}" class="block text-sm font-semibold text-stone-800 hover:text-rose-700 py-2">Tentang Founder</a>
            <a href="{{ route('user.bookings.index') }}" class="block text-sm font-semibold text-stone-800 hover:text-rose-700 py-2">Pesanan Saya</a>
            <a href="{{ route('profile.edit') }}" class="block text-sm font-semibold text-stone-500 py-2">Edit Akun</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-sm font-semibold text-rose-600 py-2">Log Out</button>
            </form>
        @else
            <div class="pt-4 border-t border-stone-100 flex gap-4">
                <a href="{{ route('login') }}" class="flex-1 text-center py-3 rounded-full border border-stone-200 text-xs font-bold text-stone-800">Masuk</a>
                <a href="{{ route('register') }}" class="flex-1 text-center py-3 rounded-full bg-rose-700 text-white text-xs font-bold">Daftar</a>
            </div>
        @endauth

        <div class="pt-2">
            <a href="{{ route('user.booking.create') }}" class="block w-full text-center py-3.5 rounded-full bg-stone-900 text-white text-xs font-bold uppercase tracking-widest italic">
                Booking Jadwal Sekarang
            </a>
        </div>
    </div>
</nav>
