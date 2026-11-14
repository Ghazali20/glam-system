<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueWidget extends BaseWidget
{
    // Agar tampilan kartu statistik melebar memenuhi dashboard
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        // Hitung Pendapatan (Hanya yang status Invoicenya 'paid')
        $totalRevenue = Invoice::where('payment_status', 'paid')->sum('total_amount');

        // Hitung Total Semua Booking
        $totalBookings = Booking::count();

        // Hitung Booking yang masih 'pending' (butuh konfirmasi)
        $pendingBookings = Booking::where('status', 'pending')->count();

        return [
            Stat::make('Total Pendapatan (Lunas)', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Total uang masuk dari invoice lunas')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Total Pesanan', $totalBookings . ' Data')
                ->description('Semua riwayat booking pelanggan')
                ->descriptionIcon('heroicon-m-calendar-days'),

            Stat::make('Menunggu Konfirmasi', $pendingBookings . ' Booking')
                ->description('Pesanan status pending')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}