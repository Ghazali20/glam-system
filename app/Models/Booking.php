<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    // Mengizinkan semua kolom diisi secara otomatis lewat Controller
    protected $guarded = [];

    /**
     * Relasi ke tabel Service (Pesanan ini milik paket layanan tertentu)
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Relasi ke tabel Invoice (Satu pesanan memiliki satu tagihan invoice)
     */
    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
}