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
        Schema::table('services', function (Blueprint $table) {
            // Menambahkan kolom category_id sebagai foreign key yang merujuk ke tabel categories
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null'); // Jika kategori dihapus, layanan tetap ada dengan kategori kosong
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Menghapus relasi dan kolom saat migrasi di-rollback
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};