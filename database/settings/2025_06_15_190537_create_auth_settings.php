<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('auth.recaptcha_enable', true);
        $this->migrator->add('auth.recaptcha_key', '6LdmLmErAAAAADtl6jwYPMxUHCGADUM9hkio9AYO');
        $this->migrator->add('auth.recaptcha_secret', '6LdmLmErAAAAAHYEMlKSKuDtq75yvZ4fL3QxwFfJ');
    }
};
