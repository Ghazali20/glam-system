<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    // Mengizinkan semua kolom diisi secara otomatis lewat Controller
    protected $guarded = [];

    /**
     * Relasi ke tabel Booking (Invoice ini milik data pesanan tertentu)
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}