<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

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
Route::get('/admin/gallery', [GalleryController::class, 'adminGallery'])->name('admin.gallery');
Route::get('/albums/{id}/photos', [GalleryController::class, 'showAlbumPhotos'])->name('albums.photos');
Route::post('/upload-photos', [GalleryController::class, 'storePhotos'])->name('upload-photos');
Route::patch('/albums/update', [GalleryController::class, 'updateAlbum'])->name('albums.update');
Route::delete('/albums/{id}', [GalleryController::class, 'deleteAlbum'])->name('albums.delete');
Route::post('/albums/create', [GalleryController::class, 'storeAlbum'])->name('albums.store');
Route::delete('/delete-image/{id}', [GalleryController::class, 'deleteImage'])->name('image.delete');


Route::get('/booking/{packageId}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/store-booking', [BookingController::class, 'store'])->name('store.booking');
Route::get('/events', [BookingController::class, 'getEvents'])->name('events');

Route::post('/send-sms', [BookingController::class, 'sendSms'])->name('send-sms');

Route::get('/admin-bookings', [BookingController::class, 'bookingManagement'])->name('booking-management');
Route::post('/update-booking-status', [BookingController::class, 'updateBookingStatus'])->name('update-booking-status');

Route::get('/admin-packages', [PackageController::class, 'packagesManagement'])->name('package-management');
Route::post('/packages', [PackageController::class, 'packageStore'])->name('packages.store');
Route::put('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/delete/{id}', [PackageController::class, 'delete'])->name('packages.delete');



Route::get('/notifications/markAllAsRead', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
