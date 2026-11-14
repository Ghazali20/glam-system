<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceDownloadTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_download_another_users_invoice(): void
    {
        $owner = User::factory()->create();
        $stranger = User::factory()->create();

        $category = Category::create(['name' => 'Wedding', 'slug' => 'wedding']);
        $service = Service::create([
            'name' => 'Paket Wedding Luxury',
            'price' => 5000000,
            'category_id' => $category->id,
        ]);

        $booking = Booking::create([
            'user_id' => $owner->id,
            'customer_name' => $owner->name,
            'service_id' => $service->id,
            'booking_date' => now()->toDateString(),
            'whatsapp' => '081234567890',
            'location' => 'Padang, Kuranji',
            'address_details' => 'Jl. Khatib Sulaiman No. 10',
            'payment_method' => 'BCA',
            'status' => 'confirmed',
        ]);

        // Invoice will be automatically created via Booking model observer or manually created
        $invoice = $booking->invoice ?? Invoice::create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-TEST-001',
            'total_amount' => 5000000,
            'payment_status' => 'paid',
        ]);

        // Attempt by stranger should be 403 Forbidden
        $response = $this->actingAs($stranger)->get(route('invoice.download', $invoice));
        $response->assertStatus(403);
    }

    public function test_owner_can_download_own_invoice(): void
    {
        $owner = User::factory()->create();

        $category = Category::create(['name' => 'Wedding', 'slug' => 'wedding']);
        $service = Service::create([
            'name' => 'Paket Wedding Luxury',
            'price' => 5000000,
            'category_id' => $category->id,
        ]);

        $booking = Booking::create([
            'user_id' => $owner->id,
            'customer_name' => $owner->name,
            'service_id' => $service->id,
            'booking_date' => now()->toDateString(),
            'whatsapp' => '081234567890',
            'location' => 'Padang, Kuranji',
            'address_details' => 'Jl. Khatib Sulaiman No. 10',
            'payment_method' => 'BCA',
            'status' => 'confirmed',
        ]);

        $invoice = $booking->invoice ?? Invoice::create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-TEST-002',
            'total_amount' => 5000000,
            'payment_status' => 'paid',
        ]);

        $response = $this->actingAs($owner)->get(route('invoice.download', $invoice));
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
}
