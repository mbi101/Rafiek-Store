<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\RoleController;
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

            //Role Routes
            Route::resource('roles', RoleController::class);
        });

        //Auth Routes
        Route::controller(AuthController::class)->group(function () {
            Route::get('login', 'login')->name('login');
            Route::post('login', 'storeLogin')->name('login.store');
            Route::post('logout', 'logout')->middleware('auth:admin')->name('logout');
        });


        //Recover Password Routes
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgotPasswordController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('email');
                Route::post('email', 'sendOtp')->name('email.post');
                Route::get('verify/{email}', 'showOtpForm')->name('verify');
                Route::post('verify/', 'verifyOtp')->name('verify.post');
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('reset/{email}/{code}', 'showResetForm')->name('reset');
                Route::post('reset', 'resetPassword')->name('reset.post');
            });
        });
    }
);
