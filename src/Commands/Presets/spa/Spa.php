<?php

namespace Tkach\LaravelPresets\Commands\Presets\Spa;

use Illuminate\Foundation\Console\Presets\Preset;

class Spa extends Preset
{
    public static function install()
    {
        static::createSpaController();
        static::createLayout();
    }

    protected static function createSpaController()
    {
        if (!file_exists(base_path('app/Http/Controllers/SpaController.php'))) {
            file_put_contents(
                base_path('app/Http/Controllers/SpaController.php'),
                file_get_contents(__DIR__ . '/stubs/SpaController.php')
            );
        }

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/stubs/web.php')
        );
    }

    protected static function createLayout()
    {
        if (!is_dir(base_path('resources/views/layouts'))) {
            mkdir(base_path('resources/views/layouts'), 0755, true);
        }

        $file_put_contents = [
            [
                'from' => '/stubs/app.blade.php',
                'to' => 'resources/views/layouts/app.blade.php',
            ],[
                'from' => '/stubs/home.blade.php',
                'to' => 'resources/views/home.blade.php',
            ],[
                'from' => '/stubs/app.js',
                'to' => 'resources/js/app.js',
            ],[
                'from' => '/stubs/App.vue',
                'to' => 'resources/js/components/App.vue',
            ],
        ];

        foreach ($file_put_contents as $path) {
            file_put_contents(
                base_path($path['to']),
                file_get_contents(__DIR__ . $path['from'])
            );
        }

        $unlinks = [
            'resources/views/welcom.blade.php',
            'resources/js/ExampleComponent.vue',
        ];

        foreach ($unlinks as $path) {
            if (file_exists(base_path($path))) {
                unlink($path);
            }
        }
    }
}