<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;

// Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/booking/{id}', [BookingController::class, 'booking'])->name('booking');
    Route::post('/booking-send', [BookingController::class, 'bookingSend'])->name('booking.send');
    Route::post('/contact', [ContactController::class, 'sendFeedback'])->name('feedback.send');

    Route::post('/booking', [BookingController::class, 'store']); // Create a booking
    Route::get('/bookings/{id}', [BookingController::class, 'show']); // Get a single booking
    Route::put('/bookings/{id}', [BookingController::class, 'update']); // Update a booking
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']); // Delete a booking
});



Route::get('/properties', [PropertyController::class, 'properties'])->name('properties');
Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property.details');
Route::get('/apartments', [PropertyController::class, 'apartments'])->name('apartments');
Route::get('/apartments/{id}', [PropertyController::class, 'show'])->name('apartments.show');



Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/book', [ShopController::class, 'book'])->name('book');
Route::get('/cadogan/{id}', [PropertyController::class, 'cadogan'])->name('cadogan');
Route::get('/victory/{id}', [PropertyController::class, 'victory'])->name('victory');
Route::get('/milverton/{id}', [PropertyController::class, 'milverton'])->name('milverton');

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');
Route::get('/email/resend', [AuthController::class, 'resend'])->name('verification.resend');
Route::get('/verify-email-page', [AuthController::class, 'verifyEmailPage'])->name('verify.email.page');
Route::get('/email-register', [AuthController::class, 'emailRegister'])->name('email-register');
Route::get('/forgot-password-email', [AuthController::class, 'forgotPasswordEmail'])->name('forgot.password.email')->middleware('guest');
Route::post('/password-email', [AuthController::class, 'passwordEmail'])->name('password.email')->middleware('guest');
Route::get('/password-reset', [AuthController::class, 'passwordReset'])->name('password.reset')->middleware('guest');
Route::post('/password-update', [AuthController::class, 'passwordUpdate'])->name('password.update')->middleware('guest');


Route::get('/payment', function () {
    return view('paystack'); // Serve a view directly
});
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

