<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Membuat dan mengunduh file PDF Invoice dengan pemeriksaan otorisasi (mencegah IDOR).
     */
    public function download(Invoice $invoice)
    {
        $user = Auth::user();

        // Otorisasi: hanya pemilik pesanan atau admin yang dapat mengunduh invoice
        $isOwner = $invoice->booking && (int) $invoice->booking->user_id === (int) $user->id;
        $isAdmin = method_exists($user, 'isAdmin') ? $user->isAdmin() : false;

        if (! $isOwner && ! $isAdmin) {
            abort(403, 'Akses tidak sah. Anda tidak memiliki izin untuk mengunduh invoice ini.');
        }

        // Eager load data relasi agar rendering PDF efisien tanpa N+1
        $invoice->loadMissing(['booking.service', 'booking.user']);

        $pdf = Pdf::loadView('user.invoice_pdf', compact('invoice'));

        return $pdf->download('Invoice-' . $invoice->invoice_number . '.pdf');
    }
}