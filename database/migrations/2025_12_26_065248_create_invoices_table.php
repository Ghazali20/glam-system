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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // Setiap invoice harus punya relasi ke data booking
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number')->unique(); // Contoh: INV-20251226-XXXX
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_status')->default('unpaid'); // unpaid, partial, paid
            $table->string('pdf_path')->nullable(); // Lokasi penyimpanan file PDF di server
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};