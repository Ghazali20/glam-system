<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($booking) {
            // Cek jika status berubah jadi confirmed DAN data invoice belum pernah dibuat
            if ($booking->status === 'confirmed' && !$booking->invoice()->exists()) {

                // Mengambil harga dari relasi service
                $amount = $booking->service ? $booking->service->price : 0;

                // Membuat data invoice tanpa kolom 'user_id' karena tidak ada di tabel invoices
                $booking->invoice()->create([
                    'invoice_number' => 'INV-' . strtoupper(uniqid()),
                    'total_amount'   => $amount,         // Kolom benar sesuai database
                    'payment_status' => 'paid',           // Kolom benar sesuai database
                    // 'user_id' sengaja dihapus karena kolomnya tidak ditemukan di database Anda
                ]);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
}