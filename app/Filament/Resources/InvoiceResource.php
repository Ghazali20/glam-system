<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Models\Invoice;
use App\Models\PaymentSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationLabel = 'Tagihan (Invoices)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('invoice_number')->disabled(),
                    Forms\Components\Select::make('payment_method')
                        ->label('Metode Pembayaran')
                        ->options(fn (): array => PaymentSetting::current()->paymentOptions())
                        ->required(),
                    Forms\Components\DateTimePicker::make('payment_deadline')
                        ->label('Batas Waktu Pembayaran')
                        ->default(now()->addHours(24)),
                    Forms\Components\Select::make('payment_status')
                        ->options([
                            'unpaid' => 'Belum Bayar',
                            'paid' => 'Lunas',
                        ])->required(),
                    Forms\Components\TextInput::make('total_amount')->prefix('Rp')->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')->label('No. Invoice')->searchable(),
                Tables\Columns\TextColumn::make('booking.customer_name')->label('Pelanggan'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total Bayar')
                    ->getStateUsing(fn ($record) => 'Rp ' . number_format((float)$record->total_amount, 0, ',', '.')),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Status Bayar')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        default => 'gray',
                    }),
                // Kolom Batas Waktu Dihapus dari Tabel Utama
            ])
            ->paginated(false)
            ->bulkActions([])
            ->actions([
                // FITUR BARU: Download Invoice
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(fn ($record) => route('invoice.download', $record))
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('kirim_wa')
                    ->label('Kirim WA')
                    ->icon('heroicon-s-chat-bubble-left-right')
                    ->color('success')
                    ->url(function ($record) {
                        $nomorWA = $record->booking->whatsapp;
                        if (str_starts_with($nomorWA, '0')) { $nomorWA = '62' . substr($nomorWA, 1); }

                        // Pesan WA: Konfirmasi Bukti Invoice & Info 2 Hari Sebelum Hari H
                        $pesan = "Halo Kak *" . $record->booking->customer_name . "*,\n\n" .
                                 "Ini adalah bukti invoice konfirmasi untuk pesanan Anda di *Glam By Ramdiah*:\n" .
                                 "----------------------------------\n" .
                                 "No. Invoice: " . $record->invoice_number . "\n" .
                                 "Status: *" . strtoupper($record->payment_status) . "*\n" .
                                 "Total: *Rp " . number_format($record->total_amount, 0, ',', '.') . "*\n" .
                                 "----------------------------------\n\n" .
                                 "Terima kasih telah mempercayai Glam By Ramdiah. ✨\n\n" .
                                 "Tunggu info selanjutnya ya Kak, *2 hari sebelum hari H* akan kami infokan kembali untuk detail persiapannya. See you! 💄";

                        return "https://wa.me/{$nomorWA}?text=" . urlencode($pesan);
                    })
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}