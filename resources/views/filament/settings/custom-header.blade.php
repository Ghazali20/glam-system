<div class="grid grid-cols-1 gap-4 mb-6">
    <div class="flex items-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="p-3 mr-4 bg-green-100 rounded-full">
            <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div>
            <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                Total Pendapatan Bersih (Lunas)
            </h2>
            <div class="flex items-baseline">
                <p class="text-4xl font-extrabold text-gray-900">
                    {{ $total }}
                </p>
                <span class="ml-2 text-sm font-medium text-green-600">
                    Selesai Dibayar
                </span>
            </div>
            <p class="mt-1 text-xs text-gray-400">
                *Data dihitung secara otomatis dari Invoice yang berstatus Paid.
            </p>
        </div>
    </div>
</div>

<hr class="border-gray-200 mb-6">