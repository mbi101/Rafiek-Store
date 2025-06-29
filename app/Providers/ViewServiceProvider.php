<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\User;
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

        View::composer('dashboard.partials._sidebar', function () {
            $counts = Cache::remember('dashboard_counts', now()->addMinutes(60), function () {
                return [
                    'categories_count' => Category::count(),
                    'brands_count' => Brand::count(),
                    'admins_count' => Admin::count(),
                    'users_count' => User::count(),
                    'coupons_count' => Coupon::count(),
                    'contacts_count' => Contact::where('is_read', 0)->count(),
                    'faqs_count' => Faq::count(),
                ];
            });

            View::share($counts);
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
