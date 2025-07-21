<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_light_logo;
    public string $site_dark_logo;
    public string $site_favicon;
    public string $site_name;
    public string $site_name_ar;
    public string $site_name_en;
    public string $site_url;
    public string $site_email;
    public string $site_phone;
    public string $site_address_ar;
    public string $site_address_en;
    public string $site_head_content_ar;
    public string $site_head_content_en;
    public string $site_keywords;

    public static function group(): string
    {
        return 'general';
    }
}