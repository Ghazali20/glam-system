<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\PaymentSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Pesanan Pelanggan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pesanan')->schema([
                    Forms\Components\TextInput::make('customer_name')
                        ->label('Nama Pelanggan')
                        ->required(),
                    Forms\Components\TextInput::make('whatsapp')
                        ->label('WhatsApp')
                        ->required(),
                    Forms\Components\DatePicker::make('booking_date')
                        ->label('Tanggal Acara')
                        ->required(),
                    Forms\Components\Select::make('event_type')
                        ->label('Jenis Acara')
                        ->options([
                            'Wedding' => 'Wedding',
                            'Engagement' => 'Engagement / Lamaran',
                            'Graduation' => 'Wisuda',
                            'Prewedding' => 'Prewedding',
                            'Party' => 'Party / Acara Formal',
                            'Other' => 'Lainnya',
                        ])
                        ->required(),
                    Forms\Components\TimePicker::make('event_time')
                        ->label('Jam Mulai Makeup')
                        ->required(),
                    Forms\Components\TextInput::make('attendee_count')
                        ->label('Jumlah yang Dirias')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(50)
                        ->required(),
                    Forms\Components\Select::make('service_id')
                        ->label('Layanan')
                        ->relationship('service', 'name')
                        ->required(),

                    Forms\Components\TextInput::make('location')
                        ->label('Kabupaten/Kota & Kecamatan')
                        ->required(),

                    Forms\Components\Select::make('payment_method')
                        ->label('Metode Pembayaran')
                        ->options(fn (): array => PaymentSetting::current()->paymentOptions())
                        ->required(),

                    Forms\Components\Select::make('status')
                        ->options([
                            'pending' => 'Pending (Menunggu Bayar)',
                            'confirmed' => 'Confirmed (Sudah Bayar)',
                            'cancelled' => 'Cancelled',
                        ])
                        ->default('pending')
                        ->required(),

                    Forms\Components\Textarea::make('address_details')
                        ->label('Alamat Lengkap & Catatan')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('special_requests')
                        ->label('Permintaan Khusus')
                        ->placeholder('Contoh: alergi produk, referensi makeup, atau kebutuhan touch-up.')
                        ->columnSpanFull(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('service.name')->label('Layanan'),

                Tables\Columns\TextColumn::make('booking_date')
                    ->label('Tanggal')
                    ->date('d-m-Y'),

                Tables\Columns\TextColumn::make('location')->label('Lokasi'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->paginated(false)
            ->headerActions([
                Tables\Actions\Action::make('export_all')
                    ->label('Ekspor Pesanan Lunas')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(function () {
                        $records = Booking::where('status', 'confirmed')->with('service')->get();

                        return response()->streamDownload(function () use ($records): void {
                            $handle = fopen('php://output', 'w');
                            fputcsv($handle, ['Nama Pelanggan', 'WhatsApp', 'Tanggal', 'Layanan', 'Lokasi', 'Status']);

                            foreach ($records as $record) {
                                fputcsv($handle, [
                                    self::safeSpreadsheetValue($record->customer_name),
                                    self::safeSpreadsheetValue($record->whatsapp),
                                    $record->booking_date,
                                    self::safeSpreadsheetValue($record->service?->name),
                                    self::safeSpreadsheetValue($record->location),
                                    $record->status,
                                ]);
                            }

                            fclose($handle);
                        }, "Laporan_Lunas.csv", ['Content-Type' => 'text/csv; charset=UTF-8']);
                    }),
            ])
            ->actions([
                // Fitur LUNAS Cepat
                Tables\Actions\Action::make('konfirmasi_lunas')
                    ->label('LUNAS')
                    ->icon('heroicon-o-check-badge')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record): void {
                        $record->load('invoice');

                        if ($record->invoice) {
                            $record->invoice->update(['payment_status' => 'paid']);
                        } else {
                            $record->update(['status' => 'confirmed']);
                        }
                    }),

                // TOMBOL BARU: Lihat Invoice
                Tables\Actions\Action::make('view_invoice')
                    ->label('Invoice')
                    ->icon('heroicon-m-document-text')
                    ->color('success')
                    // Hanya muncul jika status confirmed dan data invoice sudah terbuat otomatis di DB
                    ->visible(fn ($record) => $record->status === 'confirmed' && $record->invoice()->exists())
                    ->url(fn ($record) => route('filament.admin.resources.invoices.index', [
                        'tableSearch' => $record->invoice->invoice_number,
                    ])),

                // Fitur Kirim WA
                Tables\Actions\Action::make('kirim_wa')
                    ->label('WA')
                    ->icon('heroicon-s-chat-bubble-left-right')
                    ->color('primary')
                    ->hidden(fn ($record) => $record->status !== 'confirmed')
                    ->url(function ($record) {
                        $nomorWA = preg_replace('/^0/', '62', $record->whatsapp);
                        $pesan = "Halo Kak *" . $record->customer_name . "*, Pembayaran booking MUA Anda telah kami konfirmasi. Terima kasih! ✨";
                        return "https://wa.me/{$nomorWA}?text=" . urlencode($pesan);
                    })
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    private static function safeSpreadsheetValue(?string $value): string
    {
        $value = (string) $value;

        return preg_match('/^[=+\-@]/', $value) === 1 ? "'" . $value : $value;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}