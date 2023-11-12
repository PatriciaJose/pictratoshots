<?php

use App\Http\Controllers\NotificationAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Models\PhotoshootType;

Route::get('/', function () {
    $photoshootTypes = PhotoshootType::with(['albums' => function ($query) {
        $query->with(['images' => function ($query) {
            $query->take(6);
        }]);
    }])->get();

    $feedbacks = Feedback::all();
    $feedbackData = [];
    foreach ($feedbacks as $feedback) {
        $booking = Booking::find($feedback->bookingID);
        if ($booking) {
            $user = User::find($booking->clientID);
            $photoshootType = PhotoshootType::find($booking->package->typeID);
            if ($user && $photoshootType) {
                $feedbackData[] = [
                    'user' => $user,
                    'feedback' => $feedback,
                    'photoshootType' => $photoshootType,
                ];
            }
        }
    }

    return view('welcome', compact('photoshootTypes', 'feedbackData'));
});



Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('home');

Route::get('/post', [HomeController::class, 'post'])
    ->middleware(['auth', 'admin']);

Route::get('/packages', [PackageController::class, 'index'])->name('packages');
Route::get('/my-bookings', [BookingController::class, 'showBookings'])->name('my-bookings');

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::get('/admin-feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('feedback.submit');


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
Route::post('/disapprove', [BookingController::class, 'addReason'])->name('add-reason');

Route::get('/admin-bookings', [BookingController::class, 'bookingManagement'])->name('booking-management');
Route::post('/update-booking-status', [BookingController::class, 'updateBookingStatus'])->name('update-booking-status');

Route::get('/admin-packages', [PackageController::class, 'packagesManagement'])->name('package-management');
Route::post('/packages', [PackageController::class, 'packageStore'])->name('packages.store');
Route::put('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/delete/{id}', [PackageController::class, 'delete'])->name('packages.delete');

Route::get('/admin-events', [EventController::class, 'index'])->name('event.index');
Route::post('/event/create', [EventController::class, 'eventStore'])->name('event.store');
Route::put('/event/update', [EventController::class, 'updateEvent'])->name('event.update');
Route::delete('/event/{id}', [EventController::class, 'deleteEvent'])->name('event.delete');

Route::post('/insert-weather', [WeatherController::class, 'insertWeather'])->name('insert.weather');
Route::post('/send-rating-form', [FeedbackController::class, 'sendRatingForm'])->name('send-rating-form');
Route::get('/fetch-notification-count', [NotificationController::class, 'fetchNotificationCount'])->name('fetch-notification-count');
Route::get('/fetch-notifications', [NotificationController::class, 'fetchNotifications'])->name('fetch-notifications');
Route::get('/fetch-booking-status', [NotificationController::class, 'fetchBookingStatus'])->name('fetch-booking-status');
Route::get('/fetch-weather-details', [NotificationController::class, 'fetchWeatherDetails'])->name('fetch-weather-details');
Route::get('/fetch-booking-details',  [NotificationController::class, 'fetchBookingDetails'])->name('fetch-booking-details');
Route::post('/markAsViewed',  [NotificationController::class, 'marksAsViewed'])->name('markAsViewed');
Route::get('/fetch-rating-form/{ratingFormID}', [FeedbackController::class, 'fetchRatingForm'])->name('fetch-rating-form');
Route::get('/check-booking-feedback/{bookingID}', [FeedbackController::class, 'checkBookingFeedback'])->name('check-booking-feedback');


Route::get('/fetch-notification-count-admin', [NotificationAdminController::class, 'fetchNotificationCount'])->name('fetch-notification-count-admin');
Route::get('/fetch-notifications-admin', [NotificationAdminController::class, 'fetchNotifications'])->name('fetch-notifications-admin');
Route::post('/markAsViewedAdmin',  [NotificationAdminController::class, 'marksAsViewed'])->name('markAsViewedAdmin');
Route::get('/fetch-notifications-admin-date', [NotificationAdminController::class, 'fetchNotificationsAdmin'])->name('fetch-bookings-for-current-date');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile-admin', [ProfileController::class, 'editAdmin'])->name('admin.edit');
    Route::patch('/profile-admin', [ProfileController::class, 'updateAdmin'])->name('admin.update');
    Route::delete('/profile-admin', [ProfileController::class, 'destroyAdmin'])->name('admin.destroy');
});
require __DIR__ . '/auth.php';
