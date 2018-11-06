<?php

namespace Tkach\LaravelPresets\Commands\Presets\Vuex;

use Illuminate\Foundation\Console\Presets\Preset;
use Tkach\LaravelPresets\Commands\Helper;

class Vuex extends Preset
{
    public static function install()
    {
        static::updateDependencies();
        static::createLayout();
        static::vuexUp();
        static::createExampleController();
    }

    protected static function updateDependencies()
    {
        $json = json_decode(file_get_contents(base_path('package.json')));

        if (!isset($json->devDependencies)) {
            $json->devDependencies = (object)[];
        }

        $json->devDependencies->{"vuex"} = "^3.0.1";

        file_put_contents(
            base_path('package.json'),
            json_encode($json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    protected static function createLayout()
    {
        Helper::dir_create('resources/views/layouts');
        Helper::dir_create('resources/js/components/pages');

        $unlinks = [
            'resources/views/welcome.blade.php',
            'resources/js/components/ExampleComponent.vue',
        ];

        foreach ($unlinks as $path) {
            Helper::dir_remove($path);
        }
        
        $file_put_contents = [
            [
                'from' => '/stubs/views/layouts/app.blade.php',
                'to' => 'resources/views/layouts/app.blade.php',
            ],[
                'from' => '/stubs/views/home.blade.php',
                'to' => 'resources/views/home.blade.php',
            ],[
                'from' => '/stubs/js/app.js',
                'to' => 'resources/js/app.js',
            ],[
                'from' => '/stubs/js/components/App.vue',
                'to' => 'resources/js/components/App.vue',
            ],[
                'from' => '/stubs/js/components/pages/Home.vue',
                'to' => 'resources/js/components/pages/Home.vue',
            ],[
                'from' => '/stubs/js/components/pages/NotFound.vue',
                'to' => 'resources/js/components/pages/NotFound.vue',
            ],[
                'from' => '/stubs/routes/web.php',
                'to' => 'routes/web.php',
            ],[
                'from' => '/stubs/routes/api.php',
                'to' => 'routes/api.php',
            ],
        ];

        foreach ($file_put_contents as $path) {
            file_put_contents(
                base_path($path['to']),
                file_get_contents(__DIR__ . $path['from'])
            );
        }
    }

    private static function vuexUp()
    {
        $dirs = [
            'resources/js/api',
            'resources/js/store/modules/auth',
        ];

        foreach ($dirs as $path) {
            Helper::dir_create($path);
        }
        
        $base_path = '/stubs/js/';

        $files = [
            [
                'for' => $base_path . '/api/auth.js',
                'to' => 'resources/js/api/auth.js',
            ],[
                'for' => $base_path . '/store/index.js',
                'to' => 'resources/js/store/index.js',
            ],[
                'for' => $base_path . '/store/modules/auth/index.js',
                'to' => 'resources/js/store/modules/auth/index.js',
            ],[
                'for' => $base_path . '/store/modules/auth/index.js',
                'to' => 'resources/js/store/modules/auth/index.js',
            ],[
                'for' => $base_path . '/store/modules/auth/actions.js',
                'to' => 'resources/js/store/modules/auth/actions.js',
            ],[
                'for' => $base_path . '/store/modules/auth/getters.js',
                'to' => 'resources/js/store/modules/auth/getters.js',
            ],[
                'for' => $base_path . '/store/modules/auth/mutations.js',
                'to' => 'resources/js/store/modules/auth/mutations.js',
            ],[
                'for' => $base_path . '/store/modules/auth/state.js',
                'to' => 'resources/js/store/modules/auth/state.js',
            ],[
                'for' => $base_path . '/store/modules/auth/mutation-types.js',
                'to' => 'resources/js/store/modules/auth/mutation-types.js',
            ],
        ];

        foreach ($files as $path) {
            file_put_contents(
                base_path($path['to']),
                file_get_contents(__DIR__ . $path['for'])
            );
        }
    }

    private static function createExampleController()
    {
        file_put_contents(
            base_path('app/Http/Controllers/ExampleController.php'),
            file_get_contents(__DIR__ . '/stubs/Controllers/ExampleController.php')
        );
    }
    

}