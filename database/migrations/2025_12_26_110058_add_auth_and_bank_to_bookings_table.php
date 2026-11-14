<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // 1. Menghubungkan pesanan ke tabel users (Akun Pelanggan)
            // nullable() digunakan agar data lama tidak error saat migrasi
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // 2. Menyimpan detail nomor rekening tujuan transfer secara permanen
            $table->string('payment_account')->default('12345678 (BCA) a/n Ramdiah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Menghapus foreign key dan kolom jika migrasi di-rollback
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'payment_account']);
        });
    }
};