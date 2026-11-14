<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevenueReportResource\Pages;
use App\Models\Invoice;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class RevenueReportResource extends Resource
{
    protected static ?string $model = Invoice::class; // Kita menggunakan data dari model Invoice
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Laporan Pendapatan';

    public static function table(Table $table): Table
    {
        // Menghitung total pendapatan dari invoice yang sudah lunas (Paid)
        $totalRevenue = Invoice::where('payment_status', 'paid')->sum('total_amount');

        return $table
            ->header(view('filament.settings.custom-header', [
                'total' => 'Rp ' . number_format($totalRevenue, 0, ',', '.')
            ]))
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('No. Invoice'),
                Tables\Columns\TextColumn::make('booking.customer_name')
                    ->label('Pelanggan'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Jumlah')
                    ->getStateUsing(fn ($record) => 'Rp ' . number_format((float)$record->total_amount, 0, ',', '.')),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Bayar')
                    ->getStateUsing(fn ($record) => $record->updated_at->format('d/m/Y')),
            ])
            ->query(Invoice::where('payment_status', 'paid')) // Hanya tampilkan yang lunas
            ->paginated(false) // Matikan pagination untuk cegah error intl
            ->bulkActions([])
            ->actions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRevenueReports::route('/'),
        ];
    }
}