<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menghapus kolom lama.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Menghapus kolom 'category' tipe string yang memicu error 1364
            if (Schema::hasColumn('services', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    /**
     * Kembalikan migrasi jika diperlukan.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->nullable();
        });
    }
};