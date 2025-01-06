<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\SellerRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google-callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/seller-requests', [SellerRequestController::class, 'adminIndex'])->name('admin.seller-requests.index');
    Route::post('/admin/seller-requests/{id}/approve', [SellerRequestController::class, 'approve'])->name('admin.seller-requests.approve');
    Route::post('/admin/seller-requests/{id}/reject', [SellerRequestController::class, 'reject'])->name('admin.seller-requests.reject');
});



Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/seller-request', [SellerRequestController::class, 'index'])->name('seller-request.index');
    Route::post('/seller-request', [SellerRequestController::class, 'store'])->name('seller-request.store');
});



require __DIR__ . '/auth.php';
