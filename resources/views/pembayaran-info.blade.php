<div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
    <div class="text-center mb-6">
        <h2 class="text-lg font-bold text-gray-800">Menunggu Pelunasan</h2>
        <div class="mt-2 inline-block px-3 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-bold uppercase">
            Batas Waktu: {{ $deadline->format('H:i') }} WIB ({{ $deadline->format('d M') }})
        </div>
    </div>

    <div class="space-y-3">
        <div class="flex justify-between items-center py-2 border-b border-dashed">
            <span class="text-xs text-gray-500 italic">Metode Transfer</span>
            <span class="text-sm font-bold text-gray-900">{{ $booking->payment_method }}</span>
        </div>

        <div class="flex justify-between items-center py-2 border-b border-dashed">
            <span class="text-xs text-gray-500 italic">Total Nominal</span>
            <span class="text-lg font-black text-green-600">
                Rp {{ number_format($booking->service->price ?? 0, 0, ',', '.') }}
            </span>
        </div>
    </div>

    <div class="mt-6 p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
        <p class="text-[10px] text-yellow-800 leading-relaxed italic">
            * Tombol <strong>"Kirim WA"</strong> dan <strong>"Ekspor Excel"</strong> akan muncul secara otomatis setelah Admin mengubah status pesanan menjadi <strong>Confirmed</strong> di menu Edit.
        </p>
    </div>
</div>