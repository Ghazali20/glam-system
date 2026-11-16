<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[9px] uppercase tracking-[0.3em] text-rose-700 font-bold mb-1">Account Settings</p>
                <h2 class="font-serif italic text-3xl text-stone-800 tracking-tight">
                    {{ __('Profile') }}
                </h2>
            </div>
            <a href="{{ route('user.home') }}" class="text-[10px] uppercase tracking-widest text-stone-400 hover:text-rose-700 transition font-bold">
                Kembali ke Home
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#faf8f5] min-h-[calc(100vh-105px)]">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-10 bg-white border border-stone-200/70 shadow-[0_20px_60px_rgba(0,0,0,0.04)] rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white border border-stone-200/70 shadow-[0_20px_60px_rgba(0,0,0,0.04)] rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white border border-stone-200/70 shadow-[0_20px_60px_rgba(0,0,0,0.04)] rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
