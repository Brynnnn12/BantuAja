<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\CampaignController as HomeCampaignController;
use App\Http\Controllers\Home\DonationController as HomeDonationController;
use App\Http\Controllers\Home\PaymentController as HomePaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');


Route::prefix('campaigns')->name('home.campaigns.')->group(function () {
    Route::get('/', [HomeCampaignController::class, 'index'])->name('index');
    Route::get('/{campaign}', [HomeCampaignController::class, 'show'])->name('show');
});



Route::middleware('auth')->prefix('donations')->name('home.donations.')->group(function () {
    Route::get('/', [HomeDonationController::class, 'index'])->name('index');

    Route::post('/', [HomeDonationController::class, 'store'])->name('store');
});


Route::prefix('payments')->name('home.payments.')->group(function () {

    Route::get('/success', [HomePaymentController::class, 'success'])->name('success');
    Route::get('/pending', [HomePaymentController::class, 'pending'])->name('pending');
    Route::get('/failed', [HomePaymentController::class, 'failed'])->name('failed');
    Route::post('/callback', [HomePaymentController::class, 'callback'])->name('callback');


    Route::middleware('auth')->group(function () {
        Route::get('/{payment}', [HomePaymentController::class, 'show'])->name('show');
        Route::get('/{payment}/process', [HomePaymentController::class, 'process'])->name('process');
    });
});


Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:Admin')->group(function () {
        Route::resource('campaigns', \App\Http\Controllers\CampaignController::class);
    });

    Route::resource('donations', \App\Http\Controllers\DonationController::class);
    Route::resource('payments', \App\Http\Controllers\PaymentController::class)->only(['index', 'show']);
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
