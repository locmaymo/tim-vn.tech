<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isPremiumUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/register/tim', [UserController::class, 'createTim'])->name('create.tim');
Route::post('/register/tim', [UserController::class, 'storeTim'])->name('store.tim');

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'postLogin'])->name('login.post');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])
    ->name('dashboard');
Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');


//
Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

Route::post('pay/monthly', [SubscriptionController::class, 'pay'])->name('pay.monthly');
Route::post('pay/yearly', [SubscriptionController::class, 'pay'])->name('pay.yearly');
Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');

Route::get('job/create', [PostJobController::class, 'create'])->name('job.create');
Route::post('job/store', [PostJobController::class, 'store'])->name('job.store');
Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
Route::put('job/{listing}/update', [PostJobController::class, 'update'])->name('job.update');
Route::get('job', [PostJobController::class, 'index'])->name('job.index');
Route::get('job/{id}/delete', [PostJobController::class, 'destroy'])->name('job.delete');
