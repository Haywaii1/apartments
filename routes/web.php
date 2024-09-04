<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;

// Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/booking', [ShopController::class, 'booking'])->name('booking');
    Route::post('/booking-send', [ShopController::class, 'bookingSend'])->name('booking.send');
    Route::post('/contact', [ContactController::class, 'sendFeedback'])->name('feedback.send');



});

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/apartments', [ShopController::class, 'apartments'])->name('apartments');
Route::get('/book', [ShopController::class, 'book'])->name('book');
Route::get('/cadogan', [ShopController::class, 'cadogan'])->name('cadogan');
Route::get('/victory-park', [ShopController::class, 'victoryPark'])->name('victory.park');
Route::get('/milverton', [ShopController::class, 'milverton'])->name('milverton');

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


