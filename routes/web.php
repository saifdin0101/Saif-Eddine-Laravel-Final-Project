<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'BodyInformation'])->name('dashboard');

Route::middleware('auth', 'BodyInformation')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::delete('/admin/delete/{user}', [AdminController::class, 'destroy'])->name('admin.delete');
        Route::post('/user/{id}/restore', [AdminController::class, 'restore'])->name('user.restore');
        Route::put('/admin/update/{user}', [AdminController::class, 'update'])->name('admin.update');
    });
    
});
Route::middleware('auth')->group(function () {
    Route::resource('body', BodyController::class);
    Route::resource('trainer', TrainerController::class);
    Route::post('/trainer/checkout', [TrainerController::class, 'checkout'])->name('trainer.checkout');
    Route::get('/trainer/payment/success', [TrainerController::class, 'paymentSuccess'])->name('trainer.success');

});
require __DIR__ . '/auth.php';
