<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\PaymentSetting;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_booking_creates_unpaid_invoice_and_admin_notification(): void
    {
        $customer = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => true]);
        $category = Category::create(['name' => 'Wedding', 'slug' => 'wedding']);
        $service = Service::create([
            'name' => 'Paket Wedding Luxury',
            'price' => 5000000,
            'category_id' => $category->id,
        ]);
        PaymentSetting::current();

        $response = $this->actingAs($customer)->postJson(route('user.booking.store'), [
            'service_id' => $service->id,
            'booking_date' => now()->addDay()->toDateString(),
            'event_type' => 'Wedding',
            'event_time' => '08:00',
            'attendee_count' => 1,
            'whatsapp' => '081234567890',
            'location' => 'Padang, Kuranji',
            'address_details' => 'Jl. Khatib Sulaiman No. 10',
            'payment_method' => 'BCA',
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonStructure(['invoice_number']);

        $this->assertDatabaseHas('invoices', [
            'invoice_number' => $response->json('invoice_number'),
            'payment_status' => 'unpaid',
            'total_amount' => 5000000,
        ]);
        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => $admin->id,
            'notifiable_type' => User::class,
        ]);
    }

    public function test_guest_cannot_create_booking(): void
    {
        $this->postJson(route('user.booking.store'), [])->assertUnauthorized();
    }

    public function test_booking_rejects_past_date_and_invalid_whatsapp(): void
    {
        $customer = User::factory()->create();
        PaymentSetting::current();

        $response = $this->actingAs($customer)->postJson(route('user.booking.store'), [
            'service_id' => 1,
            'booking_date' => now()->subDay()->toDateString(),
            'event_type' => 'Wedding',
            'event_time' => '08:00',
            'attendee_count' => 1,
            'whatsapp' => 'invalid',
            'location' => 'Padang',
            'address_details' => 'Alamat',
            'payment_method' => 'BCA',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['booking_date', 'whatsapp']);
    }

    public function test_marking_invoice_paid_confirms_booking_and_notifies_admin(): void
    {
        $customer = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => true]);
        $category = Category::create(['name' => 'Wedding', 'slug' => 'wedding']);
        $service = Service::create([
            'name' => 'Paket Wedding Luxury',
            'price' => 5000000,
            'category_id' => $category->id,
        ]);
        $booking = Booking::create([
            'user_id' => $customer->id,
            'customer_name' => $customer->name,
            'service_id' => $service->id,
            'booking_date' => now()->addDay()->toDateString(),
            'whatsapp' => '081234567890',
            'location' => 'Padang, Kuranji',
            'address_details' => 'Jl. Khatib Sulaiman No. 10',
            'payment_method' => 'BCA',
            'status' => 'pending',
        ]);
        $invoice = Invoice::create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-PAID-001',
            'total_amount' => 5000000,
            'payment_status' => 'unpaid',
        ]);

        $invoice->update(['payment_status' => 'paid']);

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'confirmed',
        ]);
        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => $admin->id,
            'notifiable_type' => User::class,
        ]);
    }
}
