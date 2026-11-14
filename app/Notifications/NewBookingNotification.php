<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class NewBookingNotification extends Notification
{
    use Queueable;

    /**
     * Menerima data booking yang baru saja dibuat
     */
    public function __construct(public Booking $booking) {}

    /**
     * Menentukan media pengiriman. Dalam hal ini menggunakan database
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Menyimpan data notifikasi dalam format array ke database
     */
    public function toArray($notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'customer_name' => $this->booking->user->name,
            'service_name' => $this->booking->service->name,
        ];
    }
}