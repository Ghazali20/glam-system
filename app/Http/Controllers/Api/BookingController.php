<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\PaymentSetting;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id'      => 'required|exists:services,id',
            'whatsapp'        => 'required|string|max:20',
            'booking_date'    => 'required|date',
            'event_type'      => 'required|string|in:Wedding,Engagement,Graduation,Prewedding,Party,Other',
            'event_time'      => 'required|date_format:H:i',
            'attendee_count'  => 'required|integer|min:1|max:50',
            'location'        => 'required|string',
            'address_details' => 'required|string',
            'special_requests' => 'nullable|string|max:2000',
            'payment_method'  => 'required|string|in:' . implode(',', array_keys(PaymentSetting::current()->paymentOptions())),
        ]);

        try {
            return DB::transaction(function () use ($validated) {
                // Tambahkan user_id dari user yang login & deadline 10 jam
                $bookingData = array_merge($validated, [
                    'user_id'          => Auth::id(),
                    'customer_name'    => Auth::user()->name,
                    'status'           => 'pending',
                    'payment_deadline' => now()->addHours(10), // Set deadline 10 jam
                ]);

                $booking = Booking::create($bookingData);
                $service = Service::find($validated['service_id']);
                $invoiceNumber = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(5));

                $invoice = Invoice::create([
                    'booking_id'     => $booking->id,
                    'invoice_number' => $invoiceNumber,
                    'total_amount'   => $service->price,
                    'payment_status' => 'unpaid',
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Booking berhasil!',
                    'data'    => [
                        'booking' => $booking,
                        'invoice' => $invoice,
                        'package_name' => $service->name
                    ]
                ], 201);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getServices()
    {
        return response()->json(Service::all());
    }
}