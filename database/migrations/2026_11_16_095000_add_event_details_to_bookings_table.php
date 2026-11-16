<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            $table->string('event_type')->nullable()->after('booking_date');
            $table->time('event_time')->nullable()->after('event_type');
            $table->unsignedSmallInteger('attendee_count')->nullable()->after('event_time');
            $table->text('special_requests')->nullable()->after('address_details');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            $table->dropColumn(['event_type', 'event_time', 'attendee_count', 'special_requests']);
        });
    }
};
