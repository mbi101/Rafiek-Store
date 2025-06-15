<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_light_logo', 'assets/website/images/logos/light_logo.png');
        $this->migrator->add('general.site_dark_logo', 'assets/website/images/logos/dark_logo.png');
        $this->migrator->add('general.site_favicon', 'assets/website/images/logos/favicon.ico');
        $this->migrator->add('general.site_name', 'Rafiek - رفيق');
        $this->migrator->add('general.site_name_ar', 'رفيق');
        $this->migrator->add('general.site_name_en', 'Rafiek');
        $this->migrator->add('general.site_url', 'https://rafiekhome.com');
        $this->migrator->add('general.site_email', 'wehere@rafiekhome.com');
        $this->migrator->add('general.site_phone', '16270');
        $this->migrator->add('general.site_address_ar', 'رافد الدولي - دوران 47 - قسم أول كفر الشيخ، كفر الشيخ، محافظة كفر الشيخ');
        $this->migrator->add('general.site_address_en', 'Roundabout 47, in front of Royal Ceramics, Kafr el Sheikh, Egypt');
        $this->migrator->add('general.site_head_content_ar', 'مؤسسة متكاملة متخصصة في صناعة المراتب ومفروشات المنازل والفنادق وأقمشة المفروشات والستائر والأكسسوارات المبتكرة باستخدام التكنولوجيا الألمانية لكل منزل عصري، مع خبرة 30 عاماً في هذه الصناعة.');
        $this->migrator->add('general.site_head_content_en', 'An integrated institution specialized in manufacturing mattresses, home and hotel furnishings, upholstery fabrics, curtains, and innovative accessories using German technology for every modern home, with 30 years of experience in this industry.');
        $this->migrator->add('general.site_keywords', 'Rafiek, Rafiek Group, رفيق, رفيق جروب, mattresses, Medical mattresses, Rolling Mattresses, Connected spring mattresses, Separate spring mattresses, مراتب, مراتب طبية, مراتب رولينج, مراتب سوست متصلة, مراتب سوست منفصلة');
    }
};
