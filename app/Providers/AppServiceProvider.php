<?php

namespace App\Providers;

use App\Settings\AuthSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
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
