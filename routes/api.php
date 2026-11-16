<?php

use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk mengambil daftar paket layanan (Services) untuk dropdown di Form HTML
Route::get('/services', [BookingController::class, 'getServices']);

// Route untuk mengirim data booking dari Form HTML ke Database
Route::middleware(['auth:sanctum', 'verified'])->post('/bookings', [BookingController::class, 'store']);