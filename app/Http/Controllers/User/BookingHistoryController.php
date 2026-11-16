<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PaymentSetting;
use App\Models\User;
use App\Filament\Resources\BookingResource;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
                'booking_date' => 'required|date|after_or_equal:today',
                'whatsapp' => ['required', 'string', 'regex:/^(?:\+62|62|0)[0-9]{8,13}$/'],
                'location' => 'required|string|max:255',
                'address_details' => 'required|string|max:1000',
                'payment_method' => 'required|string|in:' . implode(',', array_keys(PaymentSetting::current()->paymentOptions())),
            ]);

            $booking = DB::transaction(function () use ($validated) {
                $booking = Booking::create([
                    'user_id' => Auth::id(),
                    'customer_name' => Auth::user()->name,
                    'service_id' => $validated['service_id'],
                    'booking_date' => $validated['booking_date'],
                    'whatsapp' => $validated['whatsapp'],
                    'location' => $validated['location'],
                    'address_details' => $validated['address_details'],
                    'payment_method' => $validated['payment_method'],
                    'payment_deadline' => now()->addHours(10),
                    'status' => 'pending',
                ]);

                $booking->load('service');
                $booking->invoice()->create([
                    'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6)),
                    'total_amount' => $booking->service->price,
                    'payment_status' => 'unpaid',
                    'payment_method' => $booking->payment_method,
                    'payment_deadline' => $booking->payment_deadline,
                ]);

                return $booking;
            });

            User::where('is_admin', true)->each(function (User $admin) use ($booking): void {
                Notification::make()
                    ->title('Booking baru masuk')
                    ->body($booking->customer_name . ' memilih ' . $booking->service->name . ' pada ' . $booking->booking_date . '.')
                    ->icon('heroicon-o-calendar-days')
                    ->actions([
                        \Filament\Notifications\Actions\Action::make('lihat')
                            ->label('Lihat booking')
                            ->url(BookingResource::getUrl('index')),
                    ])
                    ->sendToDatabase($admin);
            });

            return response()->json([
                'success' => true,
                'message' => 'Booking berhasil disimpan',
                'booking_id' => $booking->id,
                'invoice_number' => $booking->invoice->invoice_number,
            ]);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Booking tidak dapat disimpan saat ini. Silakan coba lagi.',
            ], 500);
        }
    }
}