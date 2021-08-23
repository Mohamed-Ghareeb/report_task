<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.tax', 15);
        $this->migrator->add('general.healthy_leaves', 2);
        $this->migrator->add('general.yearly_leaves', 8);
    }
}
