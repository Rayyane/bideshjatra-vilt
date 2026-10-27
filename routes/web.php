<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;

// Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/', 'Home')->name('home');
Route::inertia('/packages/bhutan-thimphu-paro', 'packages/Bhutan')->name('packages.bhutan');
Route::post('/enquiries', EnquiryController::class)->middleware('throttle:5,1')->name('enquiries.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
