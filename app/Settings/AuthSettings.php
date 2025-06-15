<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AuthSettings extends Settings
{
    public bool $recaptcha_enable;
    public string $recaptcha_key;
    public string $recaptcha_secret;

    public static function group(): string
    {
        return 'auth';
    }
}
