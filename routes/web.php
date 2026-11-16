<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BookingHistoryController;
use App\Http\Controllers\InvoiceController; // Tambahkan ini
use App\Models\Service;
use App\Models\Category;
use App\Models\HomepageSetting;
use App\Models\PaymentSetting;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = Service::with('category')->take(3)->get();
    $portfolios = Portfolio::with('category')
        ->where('is_active', true)
        ->where('show_on_home', true)
        ->orderBy('order', 'asc')
        ->get();
    $homepageSettings = HomepageSetting::current();
    $paymentSetting = PaymentSetting::current();

    return view('user.home', compact('services', 'portfolios', 'homepageSettings', 'paymentSetting'));
})->name('user.home');

Route::get('/katalog', function () {
    $categories = Category::has('portfolios')->get();
    $portfolios = Portfolio::with('category')
        ->where('is_active', true)
        ->orderBy('order', 'asc')
        ->latest()
        ->get();

    return view('user.katalog', compact('portfolios', 'categories'));
})->name('user.katalog');
Route::get('/layanan', function () {
    $services = Service::with('category')->get();
    return view('user.layanan', compact('services'));
})->name('user.layanan.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/booking', function () {
        return view('user.booking', ['paymentSetting' => PaymentSetting::current()]);
    })->name('user.booking.create');
    Route::post('/booking/store', [BookingHistoryController::class, 'store'])->name('user.booking.store');
    Route::get('/my-bookings', [BookingHistoryController::class, 'index'])->name('user.bookings.index');

    // Rute Download Invoice
    Route::get('/invoice/{invoice}/download', [InvoiceController::class, 'download'])->name('invoice.download');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';