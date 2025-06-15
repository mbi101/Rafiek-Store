<?php

namespace App\Providers;

use App\Settings\AuthSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Config;
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
        $general_settings = app(GeneralSettings::class);
        $auth_settings = app(AuthSettings::class);

        Config::set('captcha.secret', $auth_settings->recaptcha_secret);
        Config::set('captcha.sitekey', $auth_settings->recaptcha_key);

        View::share([
            'general_settings' => $general_settings,
            'auth_settings' => $auth_settings,
        ]);
    }
}
