<x-app-layout>
    <div class="py-16 bg-[#faf8f5] min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-12 text-center">
                <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-2">My Orders</span>
                <h1 class="text-3xl md:text-4xl font-serif italic text-stone-900">Riwayat Pesanan Saya</h1>
            </div>

            @if($bookings->isEmpty())
                <div class="text-center py-24 bg-white rounded-[3rem] border border-stone-200/70 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                    <div class="w-16 h-16 rounded-full bg-stone-100 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-7 h-7 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <p class="text-stone-500 italic text-lg mb-2">Belum ada riwayat pemesanan</p>
                    <p class="text-stone-400 text-sm mb-8">Mulai booking layanan makeup impianmu sekarang</p>
                    <a href="{{ route('user.booking.create') }}"
                       class="inline-block bg-stone-900 text-white px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-[0.25em] hover:bg-rose-700 transition-all shadow-md italic">
                        Booking Sekarang
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($bookings as $booking)
                        <div class="bg-white p-8 md:p-10 rounded-[2.5rem] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-stone-200/70 transition-all hover:shadow-[0_15px_50px_rgba(0,0,0,0.06)]">
                            <div class="flex flex-col lg:flex-row justify-between gap-8">

                                {{-- Kiri: Info Layanan --}}
                                <div class="flex-1 space-y-5">
                                    <div>
                                        <label class="text-[9px] uppercase tracking-[0.2em] text-rose-700 font-bold block mb-2">Layanan</label>
                                        <h3 class="text-xl md:text-2xl font-serif italic text-stone-900">{{ $booking->service->name ?? 'Paket Makeup' }}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
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

                                {{-- Tengah: Pembayaran --}}
                                <div class="flex-1 bg-[#faf8f5] p-6 rounded-[2rem] border border-stone-200/60 flex flex-col justify-center">
                                    @if($booking->status == 'pending')
                                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-4">Instruksi Pembayaran</label>
                                        <div class="space-y-3">
                                            <div class="p-4 bg-white rounded-2xl border border-stone-200/70">
                                                <p class="text-sm text-stone-500 italic">Transfer ke {{ $booking->payment_method ?? 'BCA' }}:</p>
                                                <p class="text-lg font-mono font-bold text-stone-900 tracking-wider">
                                                    {{ $booking->payment_method == 'BCA' ? '1234567890' : '8877665544' }}
                                                </p>
                                                <p class="text-[10px] text-stone-500 uppercase mt-1">a/n Glam By Ramdiah</p>
                                            </div>
                                            <div class="text-center pt-2">
                                                <p class="text-[9px] uppercase text-rose-700 font-bold tracking-widest mb-1">Batas Waktu Transfer</p>
                                                <div class="text-2xl font-mono font-bold text-stone-900 tracking-tighter"
                                                     data-deadline="{{ $booking->created_at->addHours(10)->toIso8601String() }}">
                                                    00:00:00
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center space-y-3">
                                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-stone-100 text-stone-700 mb-1">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <p class="text-[10px] uppercase tracking-[0.2em] text-stone-700 font-bold">Booking Terkonfirmasi</p>
                                            <p class="text-stone-400 italic text-[11px]">Invoice resmi Anda tersedia untuk diunduh.</p>
                                        </div>
                                    @endif
                                </div>

                                {{-- Kanan: Status & Aksi --}}
                                <div class="flex-1 flex flex-col justify-center items-center lg:items-end gap-5">
                                    <span class="px-6 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest
                                        {{ $booking->status == 'confirmed' || $booking->status == 'success'
                                            ? 'bg-stone-100 text-stone-700'
                                            : 'bg-rose-50 text-rose-700' }}">
                                        {{ $booking->status }}
                                    </span>

                                    @if($booking->status == 'pending')
                                        <a href="https://wa.me/{{ config('app.admin_whatsapp', '628123456789') }}?text={{ urlencode('Halo Glam By Ramdiah, saya ingin mengirimkan bukti pembayaran untuk pesanan ' . ($booking->service->name ?? 'Makeup') . ' pada tanggal ' . $booking->booking_date . '. Terima kasih!') }}"
                                           target="_blank"
                                           class="w-full lg:w-auto bg-stone-900 text-white px-8 py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-rose-700 transition-all shadow-md text-center italic">
                                            Kirim Bukti Pembayaran
                                        </a>
                                    @elseif($booking->status == 'confirmed' || $booking->status == 'success')
                                        @if($booking->invoice)
                                            <a href="{{ route('invoice.download', $booking->invoice) }}"
                                               class="w-full lg:w-auto border-2 border-stone-900 text-stone-900 px-8 py-4 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-stone-900 hover:text-white transition-all text-center italic">
                                                Unduh Invoice
                                            </a>
                                        @endif
                                        <div class="text-center lg:text-right">
                                            <p class="text-rose-700 italic text-[11px] font-serif mb-1">Pembayaran Selesai ✨</p>
                                            <p class="text-stone-400 text-[9px] uppercase tracking-wider italic">Info lanjutan dikirim 2 hari sebelum hari H</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('user.booking.create') }}"
                       class="inline-block border border-stone-300 text-stone-600 px-10 py-4 rounded-full font-bold uppercase text-[10px] tracking-[0.25em] hover:border-stone-900 hover:text-stone-900 transition-all italic">
                        + Tambah Booking Baru
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Countdown Timer Script --}}
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
                timer.innerHTML = `${String(hours).padStart(2,'0')}:${String(minutes).padStart(2,'0')}:${String(seconds).padStart(2,'0')}`;
            });
        }
        setInterval(updateTimers, 1000);
        updateTimers();
    </script>
</x-app-layout>
