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
        if (Schema::hasTable('categories')) {
            View::share([
                'categories_count' => Category::query()->count(),
            ]);
        }
        if (Schema::hasTable('brands')) {
            View::share([
                'brands_count' => Brand::query()->count(),
            ]);
        }
        if (Schema::hasTable('admins')) {
            View::share([
                'admins_count' => Admin::query()->count(),
            ]);
        }
        if (Schema::hasTable('coupons')) {
            View::share([
                'coupons_count' => Coupon::query()->count(),
            ]);
        }
        if (Schema::hasTable('contacts')) {
            View::share([
                'contacts_count' => Contact::query()->where('is_read', 0)->count(),
            ]);
        }
        if (Schema::hasTable('faqs')) {
            View::share([
                'faqs_count' => Faq::query()->count(),
            ]);
        }

        if (Schema::hasTable('settings')) {
            $general_settings = null;
            $auth_settings = null;

            try {
                $general_settings = app(GeneralSettings::class);
                $auth_settings = app(AuthSettings::class);

                if (isset($auth_settings->recaptcha_secret) && isset($auth_settings->recaptcha_key)) {
                    Config::set('captcha.secret', $auth_settings->recaptcha_secret);
                    Config::set('captcha.sitekey', $auth_settings->recaptcha_key);
                }

            } catch (\Spatie\LaravelSettings\Exceptions\MissingSettings $e) {
                \Log::warning('Missing settings: ' . $e->getMessage());
            }

            View::share([
                'general_settings' => $general_settings,
                'auth_settings' => $auth_settings,
            ]);
        }

    }
}
