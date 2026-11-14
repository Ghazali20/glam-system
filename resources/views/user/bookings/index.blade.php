<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif italic text-2xl text-stone-900 leading-tight">
            {{ __('Riwayat Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($bookings->isEmpty())
                <div class="text-center py-20 bg-stone-50 rounded-[3rem] border border-dashed border-stone-200">
                    <p class="text-stone-400 italic">Anda belum memiliki riwayat pemesanan.</p>
                    <a href="{{ route('user.booking.create') }}" class="mt-4 inline-block text-pink-600 font-bold hover:underline">Mulai Booking Sekarang</a>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($bookings as $booking)
                        <div class="bg-white p-8 md:p-12 rounded-[3rem] shadow-[0_15px_50px_rgba(0,0,0,0.03)] border border-stone-50 transition-all hover:shadow-lg">
                            <div class="flex flex-col md:flex-row justify-between gap-8">

                                {{-- Kiri: Info Layanan --}}
                                <div class="flex-1 space-y-6">
                                    <div>
                                        <label class="text-[9px] uppercase tracking-[0.2em] text-pink-500 font-bold block mb-2">Layanan</label>
                                        <h3 class="text-2xl font-serif italic text-stone-900">{{ $booking->service->name ?? 'Paket Makeup' }}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Tanggal Acara</label>
                                            <p class="text-stone-700 font-medium">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</p>
                                        </div>
                                        <div>
                                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Lokasi</label>
                                            <p class="text-stone-600 text-sm leading-relaxed">{{ $booking->location }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tengah: Informasi Pembayaran --}}
                                <div class="flex-1 bg-stone-50/50 p-6 rounded-[2rem] border border-stone-100 flex flex-col justify-center">
                                    @if($booking->status == 'pending')
                                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-4">Instruksi Pembayaran</label>
                                        <div class="space-y-3">
                                            <div class="p-4 bg-white rounded-2xl border border-stone-100">
                                                <p class="text-sm text-stone-500 italic">Transfer ke {{ $booking->payment_method ?? 'BCA' }}:</p>
                                                <p class="text-lg font-mono font-bold text-stone-900 tracking-wider">
                                                    {{ $booking->payment_method == 'BCA' ? '1234567890' : '8877665544' }}
                                                </p>
                                                <p class="text-[10px] text-stone-600 uppercase">a/n Glam By Ramdiah</p>
                                            </div>
                                            {{-- Timer sisa waktu pembayaran tetap dipertahankan untuk urgensi user --}}
                                            <div class="text-center pt-2">
                                                <p class="text-[9px] uppercase text-pink-600 font-bold mb-1">Batas Waktu Transfer</p>
                                                <div class="text-2xl font-mono font-bold text-stone-900 tracking-tighter"
                                                     data-deadline="{{ $booking->created_at->addHours(10)->toIso8601String() }}">
                                                    00:00:00
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center space-y-2">
                                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600 mb-2">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <p class="text-[10px] uppercase tracking-[0.2em] text-green-600 font-bold">Booking Terkonfirmasi</p>
                                            <p class="text-stone-500 italic text-[11px]">Terima kasih! Invoice resmi Anda kini tersedia untuk diunduh.</p>
                                        </div>
                                    @endif
                                </div>

                                {{-- Kanan: Status & Aksi Berdasarkan Instruksi Baru --}}
                                <div class="flex-1 flex flex-col justify-center items-center md:items-end gap-6">
                                    <span class="px-6 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest
                                        {{ $booking->status == 'confirmed' || $booking->status == 'success' ? 'bg-green-50 text-green-600' : 'bg-pink-50 text-pink-600' }}">
                                        {{ $booking->status }}
                                    </span>

                                    @if($booking->status == 'pending')
                                        {{-- Pesan WA Konfirmasi Bukti Invoice --}}
                                        <a href="https://wa.me/{{ config('app.admin_whatsapp', '628123456789') }}?text={{ urlencode("Halo Glam By Ramdiah, saya ingin mengirimkan bukti invoice konfirmasi untuk pesanan " . ($booking->service->name ?? 'Makeup') . " pada tanggal " . $booking->booking_date . ". Terima kasih!") }}"
                                           target="_blank"
                                           class="w-full md:w-auto bg-stone-900 text-white px-8 py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-green-600 transition-all shadow-xl text-center italic">
                                            Kirim Bukti Pembayaran
                                        </a>
                                    @elseif($booking->status == 'confirmed' || $booking->status == 'success')
                                        {{-- Tombol Download Invoice yang Menghubungkan ke InvoiceController --}}
                                        @if($booking->invoice)
                                            <a href="{{ route('invoice.download', $booking->invoice) }}"
                                               class="w-full md:w-auto border-2 border-stone-900 text-stone-900 px-8 py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-stone-900 hover:text-white transition-all text-center italic">
                                                Unduh Bukti Invoice
                                            </a>
                                        @endif
                                        <div class="text-right">
                                            <p class="text-pink-600 italic text-[11px] font-serif mb-1">Pembayaran Selesai ✨</p>
                                            <p class="text-stone-400 text-[9px] uppercase tracking-wider italic">Info lanjutan akan dikirim 2 hari sebelum hari H</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Script Update Timers --}}
    <script>
        function updateTimers() {
            document.querySelectorAll('[data-deadline]').forEach(timer => {
                const deadline = new Date(timer.dataset.deadline).getTime();
                const now = new Date().getTime();
                const diff = deadline - now;

                if (diff <= 0) {
                    timer.innerHTML = "EXPIRED";
                    timer.classList.add('text-red-500');
                    return;
                }

                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                timer.innerHTML = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            });
        }
        setInterval(updateTimers, 1000);
        updateTimers();
    </script>
</x-app-layout>