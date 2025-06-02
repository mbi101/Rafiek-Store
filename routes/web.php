<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'as' => 'website.',
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::get('/', fn() => view('website.pages.home.index'))->name('home');

        Route::get('about', fn() => view('website.pages.about.index'))->name('about');

        Route::get('become-vendor', fn() => view('website.pages.become_vendor.index'))->name('become_vendor');

        Route::get('blogs', fn() => view('website.pages.blogs.index'))->name('blogs');

        Route::get('blogs/details', fn() => view('website.pages.blogs_details.index'))->name('blogs.details');

        Route::get('cart', fn() => view('website.pages.cart.index'))->name('cart');


        Route::get('wishlist', fn() => view('website.pages.wishlist.index'))->name('wishlist');

        Route::get('checkout', fn() => view('website.pages.checkout.index'))->name('checkout');

        Route::get('compare', fn() => view('website.pages.compare.index'))->name('compare');

        Route::get('contact', fn() => view('website.pages.contact.index'))->name('contact');

        Route::get('create-account', fn() => view('website.pages.create_account.index'))->name('create_account');

        Route::get('empty-cart', fn() => view('website.pages.empty_cart.index'))->name('empty_cart');

        Route::get('empty-wishlist', fn() => view('website.pages.empty_wishlist.index'))->name('empty_wishlist');

        Route::get('faq', fn() => view('website.pages.faq.index'))->name('faq');

        Route::get('flash-sale', fn() => view('website.pages.flash_sale.index'))->name('flash_sale');

        Route::get('login', fn() => view('website.pages.login.index'))->name('login');

        Route::get('order', fn() => view('website.pages.order.index'))->name('order');

        Route::get('privacy', fn() => view('website.pages.privacy.index'))->name('privacy');

        Route::get('terms', fn() => view('website.pages.terms.index'))->name('terms');

        Route::get('sellers', fn() => view('website.pages.sellers.index'))->name('sellers');

        Route::get('seller-sidebar', fn() => view('website.pages.seller_sidebar.index'))->name('seller_sidebar');

        Route::get('product-info', fn() => view('website.pages.product_info.index'))->name('product_info');

        Route::get('product-sidebar', fn() => view('website.pages.product_sidebar.index'))->name('product_sidebar');

        Route::get('profile', fn() => view('website.pages.profile.index'))->name('profile');

        Route::get('dash-test', fn() => view('dashboard.pages.index'))->name('dash.home');
    }
);