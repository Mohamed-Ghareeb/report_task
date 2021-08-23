<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public int $tax;
    public int $healthy_leaves;
    public int $yearly_leaves;

    public static function group(): string
    {
        return 'general';
    }
}
