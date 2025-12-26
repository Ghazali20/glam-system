<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Menyimpan data booking dan membuat invoice otomatis
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'service_id'    => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'whatsapp'      => 'required|string|max:20',
            'booking_date'  => 'required|date',
            'location'      => 'required|string',
            'address_details' => 'required|string',
        ]);

        try {
            // 2. Gunakan Database Transaction agar data tersimpan aman di tabel Booking & Invoice
            return DB::transaction(function () use ($validated) {

                // Simpan Data ke Tabel Bookings
                $booking = Booking::create($validated);

                // Ambil info harga dari tabel services
                $service = Service::find($validated['service_id']);

                // 3. Logika Pembuatan Nomor Invoice (Contoh: INV-20251226-ABCDE)
                $invoiceNumber = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(5));

                $invoice = Invoice::create([
                    'booking_id'     => $booking->id,
                    'invoice_number' => $invoiceNumber,
                    'total_amount'   => $service->price,
                    'payment_status' => 'unpaid',
                ]);

                // 4. Respon sukses untuk Frontend
                return response()->json([
                    'success' => true,
                    'message' => 'Booking dan Invoice berhasil dibuat!',
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

    /**
     * Mengambil daftar layanan untuk ditampilkan di dropdown form (Optional)
     */
    public function getServices()
    {
        $services = Service::all();
        return response()->json($services);
    }
}