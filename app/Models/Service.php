<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    // Mengizinkan semua kolom diisi secara otomatis lewat Controller
    protected $guarded = [];

    /**
     * Relasi ke tabel Booking (Satu paket layanan bisa memiliki banyak pesanan)
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}