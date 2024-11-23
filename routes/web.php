<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthProfileController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TrainerController;
use App\Models\Body;
use App\Models\Exercice;
use App\Models\Sesin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role == 'client' || $user->role == 'trainer') {
        $userbody = Body::where('user_id',$user->id)->first();
        $usercalories = $userbody->calories ;
        $userwight = $userbody->weight ;
        $treetrainers = User::where('role', 'trainer')->take(3)->get();
        $forsessions = Sesin::take(4)->get();
        $twoexercices = Exercice::take(2)->get();
        return view('dashboard',compact('usercalories','userwight','treetrainers','forsessions','twoexercices'));
    }
    return view('dashboard');
    
   
    
    return view('dashboard',compact('usercalories','userwight','treetrainers','forsessions'));
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
    Route::get('/trainer/show/{id}',[TrainerController::class ,'show'])->name('trainer.show');
    Route::post('/trainer/checkout', [TrainerController::class, 'checkout'])->name('trainer.checkout');
    Route::get('/trainer/payment/success', [TrainerController::class, 'paymentSuccess'])->name('trainer.success');
    Route::resource('session', SessionController::class);
    Route::get('/session/show/{session}',[SessionController::class,'show'])->name('session.show')->middleware('Session');
    Route::post('/session/join/{session}', [SessionController::class,'joinSession'])->name('session.join');
    Route::resource('exercice', ExerciceController::class);
    Route::post('/exercises/favorite', [ExerciceController::class, 'favorite'])->name('exercice.favorite');
    Route::post('/exercises/dettach', [ExerciceController::class, 'dettach'])->name('exercice.dettach');
    Route::post('/exercises/done', [ExerciceController::class, 'done'])->name('exercice.done');
    Route::post('/session/checkout', [SessionController::class, 'checkout'])->name('session.checkout');
    Route::get('/session/payment/success', [SessionController::class, 'paymentSuccess'])->name('session.paymentSuccess');
    Route::resource('calendar',CalendarController::class);
    Route::get('/auth/profilee/{user}',[AuthProfileController::class,'show'])->name('auth.profilee');
    Route::get('/ApprovePage',[ExerciceController::class,'ApprovePage'])->name('ApprovePage');
    Route::put('/ApprovePage/update/{session}',[ExerciceController::class,'publish'])->name('ApprovePage.publish');

    // Route::get('/calendar/create', [CalendarController::class, 'create'])->name('calender.create');


});
require __DIR__ . '/auth.php';
