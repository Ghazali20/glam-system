<?php

namespace App\Models;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    // Mengizinkan semua kolom diisi secara otomatis lewat Controller
    protected $guarded = [];

    protected static function booted(): void
    {
        static::updated(function (Invoice $invoice): void {
            if (! $invoice->wasChanged('payment_status') || $invoice->payment_status !== 'paid') {
                return;
            }

            $booking = $invoice->booking()->with(['service', 'user'])->first();

            if (! $booking) {
                return;
            }

            if ($booking->status !== 'confirmed') {
                $booking->updateQuietly(['status' => 'confirmed']);
            }

            $customerWhatsapp = preg_replace('/\D+/', '', (string) $booking->whatsapp);
            if (str_starts_with($customerWhatsapp, '0')) {
                $customerWhatsapp = '62' . substr($customerWhatsapp, 1);
            }

            $message = "Halo Kak {$booking->customer_name}, pembayaran invoice {$invoice->invoice_number} di Glam By Ramdiah telah kami konfirmasi lunas. Booking Anda sudah terkonfirmasi. Terima kasih! ✨";
            $whatsappUrl = $customerWhatsapp
                ? 'https://wa.me/' . $customerWhatsapp . '?text=' . urlencode($message)
                : null;

            User::where('is_admin', true)->each(function (User $admin) use ($booking, $invoice, $whatsappUrl): void {
                $notification = Notification::make()
                    ->title('Pembayaran lunas')
                    ->body("Invoice {$invoice->invoice_number} dari {$booking->customer_name} telah ditandai lunas.")
                    ->icon('heroicon-o-check-badge');

                if ($whatsappUrl) {
                    $notification->actions([
                        Action::make('whatsapp')
                            ->label('Kirim WhatsApp ke pelanggan')
                            ->url($whatsappUrl)
                            ->openUrlInNewTab(),
                    ]);
                }

                $notification->sendToDatabase($admin);
            });
        });
    }

    /**
     * Relasi ke tabel Booking (Invoice ini milik data pesanan tertentu)
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}