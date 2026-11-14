<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Invoice;
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
            'customer_name'   => 'required|string|max:255',
            'whatsapp'        => 'required|string|max:20',
            'booking_date'    => 'required|date',
            'location'        => 'required|string',
            'address_details' => 'required|string',
            'payment_method'  => 'required|string',
        ]);

        try {
            return DB::transaction(function () use ($validated) {
                // Tambahkan user_id dari user yang login & deadline 10 jam
                $bookingData = array_merge($validated, [
                    'user_id'          => Auth::id(), // ID User dari Breeze
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