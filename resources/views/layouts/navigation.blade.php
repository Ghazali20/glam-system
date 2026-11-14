<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('user.home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" class="h-9 w-auto">
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user.home')" :active="request()->routeIs('user.home')">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.katalog')" :active="request()->routeIs('user.katalog')">
                        {{ __('Katalog') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.layanan.index')" :active="request()->routeIs('user.layanan.index')">
                        {{ __('Layanan') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Tentang Founder') }}
                        </x-nav-link>
                    @endauth

                    <x-nav-link :href="route('user.booking.create')" :active="request()->routeIs('user.booking.create')" class="text-pink-600 font-bold">
                        {{ __('Booking Now') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('user.bookings.index')" :active="request()->routeIs('user.bookings.index')">
                            {{ __('Pesanan Saya') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1 italic">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Edit Akun') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium text-pink-600 hover:text-pink-700 uppercase tracking-widest font-bold">Register</a>
                    </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden text-center bg-white border-t border-gray-100 italic font-medium text-stone-600">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('user.home')" :active="request()->routeIs('user.home')">Home</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.katalog')" :active="request()->routeIs('user.katalog')">Katalog</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.layanan.index')" :active="request()->routeIs('user.layanan.index')">Layanan</x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Tentang Founder</x-responsive-nav-link>
            @endauth

            <x-responsive-nav-link :href="route('user.booking.create')" :active="request()->routeIs('user.booking.create')">Booking</x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('user.bookings.index')" :active="request()->routeIs('user.bookings.index')">Pesanan Saya</x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>