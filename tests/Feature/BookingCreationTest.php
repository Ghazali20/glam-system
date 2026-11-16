<?php

namespace Tests\Feature;

use App\Models\Category;
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
            'whatsapp' => 'invalid',
            'location' => 'Padang',
            'address_details' => 'Alamat',
            'payment_method' => 'BCA',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['booking_date', 'whatsapp']);
    }
}
