<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'as' => 'website.',
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

    Route::get('/', fn() => view('website.pages.home.index'))->name('home');

    Route::get('about', fn() => view('website.pages.about.index'))->name('about');

    Route::get('become-vendor', fn() => view('website.pages.become_vendor.index'))->name('become_vendor');

    Route::get('blogs', fn() => view('website.pages.blogs.index'))->name('blogs');

    Route::get('blogs/details', fn() => view('website.pages.blogs_details.index'))->name('blogs.details');

    Route::get('cart', fn() => view('website.pages.cart.index'))->name('cart');

    Route::get('checkout', fn() => view('website.pages.checkout.index'))->name('checkout');

});
