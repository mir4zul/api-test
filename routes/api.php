<?php

use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::post('trip-bookings', [App\Http\Controllers\TripBookingController::class, 'store']);
