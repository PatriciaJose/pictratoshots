<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])
->middleware(['auth', 'verified'])->name('home');

Route::get('/post', [HomeController::class, 'post'])
->middleware(['auth', 'admin']);

Route::get('/packages', [PackageController::class, 'index'])->name('packages');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/album/{id}', [GalleryController::class, 'showAlbumImages'])->name('images');


Route::get('/booking/{packageId}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/store-booking', [BookingController::class, 'store'])->name('store.booking');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
