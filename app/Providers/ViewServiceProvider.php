<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Settings\AuthSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('dashboard.*', function () {
            if (!Cache::has('categories_count')) {
                Cache::remember('categories_count', now()->addMinutes(60), function () {
                    return Category::query()->count();
                });
            }

            if (!Cache::has('brands_count')) {
                Cache::remember('brands_count', now()->addMinutes(60), function () {
                    return Brand::query()->count();
                });
            }

            if (!Cache::has('admins_count')) {
                Cache::remember('admins_count', now()->addMinutes(60), function () {
                    return Admin::query()->count();
                });
            }

            if (!Cache::has('coupons_count')) {
                Cache::remember('coupons_count', now()->addMinutes(60), function () {
                    return Coupon::query()->count();
                });
            }

            if (!Cache::has('contacts_count')) {
                Cache::remember('contacts_count', now()->addMinutes(60), function () {
                    return Contact::query()->where('is_read', 0)->count();
                });
            }

            if (!Cache::has('faqs_count')) {
                Cache::remember('faqs_count', now()->addMinutes(60), function () {
                    return Faq::query()->count();
                });
            }


            View::share([
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
                'admins_count' => Cache::get('admins_count'),
                'coupons_count' => Cache::get('coupons_count'),
                'contacts_count' => Cache::get('contacts_count'),
                'faqs_count' => Cache::get('faqs_count'),
            ]);
        });

        $general_settings = null;
        $auth_settings = null;

        if (Schema::hasTable('settings')) {
            $general_settings = app(GeneralSettings::class);
            $auth_settings = app(AuthSettings::class);
        }
        Config::set('captcha.secret', $auth_settings->recaptcha_secret);
        Config::set('captcha.sitekey', $auth_settings->recaptcha_key);

        View::share([
            'general_settings' => $general_settings,
            'auth_settings' => $auth_settings,
        ]);
    }
}
