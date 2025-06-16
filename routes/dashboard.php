<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'as' => 'dashboard.',
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::middleware('auth:admin')->group(function () {
            Route::get('/', fn() => view('dashboard.pages.index'))->name('home');
        });

        //Auth Routes
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'storeLogin'])->name('login.store');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:admin')->name('logout');
        //Recover Password Routes
        Route::get('recover-password', [ForgotPasswordController::class, 'recoverPassword'])->name('recover_password');
        Route::post('recover-password', [ForgotPasswordController::class, 'sendOtp'])->name('recover_password.send_otp');
        Route::get('confirm-password/{email}', [ForgotPasswordController::class, 'confirmPassword'])->name('confirm_password');
        Route::post('confirm-password', [ForgotPasswordController::class, 'verifyOtp'])->name('confirm_password.verify');

    }
);
