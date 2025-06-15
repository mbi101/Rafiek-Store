<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
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
        Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('forget_password');
        Route::post('forget-password', [AuthController::class, 'storeLogin'])->name('forget_password.store');

        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:admin')->name('logout');
    }
);
