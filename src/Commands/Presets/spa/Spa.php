<?php

namespace Tkach\LaravelPresets\Commands\Presets\Spa;

use Illuminate\Foundation\Console\Presets\Preset;

class Spa extends Preset
{
    public static function install()
    {
        static::createSpaController();
    }

    protected static function createSpaController()
    {
        if (!file_exists(base_path('app/Http/Controllers/SpaController.php'))) {
            file_put_contents(
                base_path('app/Http/Controllers/SpaController.php'),
                file_get_contents(__DIR__ . '/stubs/Controllers/SpaController.php')
            );
        }

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/stubs/routes/web.php')
        );
    }
}