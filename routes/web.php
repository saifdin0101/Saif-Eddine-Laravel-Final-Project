<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
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
    Route::resource('body', BodyController::class)->middleware('OneInALifeTime');
    Route::resource('trainer', TrainerController::class);
    Route::post('/trainer/checkout', [TrainerController::class, 'checkout'])->name('trainer.checkout')->middleware('CheckOut');
    Route::get('/trainer/payment/success', [TrainerController::class, 'paymentSuccess'])->name('trainer.success')->middleware('CheckOut');
    Route::resource('session', SessionController::class);
    Route::get('/session/show/{session}',[SessionController::class,'show'])->name('session.show')->middleware('Session');
    Route::post('/session/join/{session}', [SessionController::class,'joinSession'])->name('session.join');
    Route::resource('exercice', ExerciceController::class);
    Route::post('/exercises/favorite', [ExerciceController::class, 'favorite'])->name('exercice.favorite');
    Route::post('/exercises/dettach', [ExerciceController::class, 'dettach'])->name('exercice.dettach');
    Route::post('/exercises/done', [ExerciceController::class, 'done'])->name('exercice.done');




});
require __DIR__ . '/auth.php';
