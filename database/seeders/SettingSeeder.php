<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        settings()->set('site_name', 'Rafiek - رفيق');
        settings()->set('site_name_ar', 'رفيق');
        settings()->set('site_name_en', 'Rafiek');
        settings()->set('site_url', 'https://rafiekhome.com');
        settings()->set('site_email', 'wehere@rafiekhome.com');
        settings()->set('site_phone', '16270');
        settings()->set('site_address_ar', 'رافد الدولي - دوران 47 - قسم أول كفر الشيخ، كفر الشيخ، محافظة كفر الشيخ');
        settings()->set('site_address_ar', 'Roundabout 47, in front of Royal Ceramics, Kafr el Sheikh, Egypt');

        settings()->set('recaptcha_enable', 1);
        settings()->set('recaptcha_key', '6LdmLmErAAAAADtl6jwYPMxUHCGADUM9hkio9AYO');
        settings()->set('recaptcha_secret', '6LdmLmErAAAAAHYEMlKSKuDtq75yvZ4fL3QxwFfJ');
    }
}
