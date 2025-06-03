<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'as' => 'dashboard.',
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/', fn() => view('dashboard.pages.index'))->name('home');
        Route::get('login', fn() => view('dashboard.pages.auth.login'))->name('login');

    }
);
