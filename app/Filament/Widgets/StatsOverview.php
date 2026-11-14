<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    /**
     * Mengatur interval pembaruan data otomatis setiap 15 detik
     */
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        // Ambil data booking terkonfirmasi beserta relasi servicenya
        $confirmedBookings = Booking::where('status', 'confirmed')->with('service')->get();

        // Hitung total pendapatan dari harga layanan
        $totalPendapatan = $confirmedBookings->sum(function ($booking) {
            return $booking->service ? $booking->service->price : 0;
        });

        return [
            // Statistik Pendapatan: Menggunakan format manual untuk menghindari error 'intl'
            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'))
                ->description('Total dari pesanan terkonfirmasi')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            // Statistik Pesanan Berhasil: Menampilkan jumlah layanan lunas
            Stat::make('Pesanan Berhasil', $confirmedBookings->count())
                ->description('Layanan yang sudah selesai/lunas')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('primary'),

            // Statistik Pesanan Menunggu: Notifikasi visual untuk pesanan baru
            Stat::make('Pesanan Menunggu', Booking::where('status', 'pending')->count())
                ->description('Perlu segera diproses')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
        ];
    }
}