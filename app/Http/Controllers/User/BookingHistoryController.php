<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingHistoryController extends Controller
{
    /**
     * Menampilkan riwayat pesanan milik user yang sedang login.
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with(['service', 'invoice'])
            ->latest()
            ->get();
        return view('user.bookings.index', [
            'bookings' => $bookings,
            'paymentSetting' => PaymentSetting::current(),
        ]);
    }

    /**
     * Menyimpan data booking baru ke database.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_id' => 'required|exists:services,id',
                'booking_date' => 'required|date',
                'whatsapp' => 'required|string',
                'location' => 'required|string',
                'payment_method' => 'required|string|in:' . implode(',', array_keys(PaymentSetting::current()->paymentOptions())),
            ]);

            // Menyimpan data pesanan lengkap dengan tenggat pembayaran
            Booking::create([
                'user_id' => Auth::id(),
                'customer_name' => Auth::user()->name,
                'service_id' => $validated['service_id'],
                'booking_date' => $validated['booking_date'],
                'whatsapp' => $validated['whatsapp'],
                'location' => $validated['location'],
                'address_details' => $validated['location'],
                'payment_method' => $validated['payment_method'],
                'payment_deadline' => now()->addHours(10),
                'status' => 'pending',
            ]);

            return response()->json(['success' => true, 'message' => 'Booking berhasil disimpan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }
}