<?php

namespace Tkach\LaravelPresets\Commands\Presets\Vuex;

use Illuminate\Foundation\Console\Presets\Preset;

class Vuex extends Preset
{
    public static function install()
    {
        static::updateDependencies();
        static::createVuexDirectories();
        static::createVuexFiles();
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

    private static function createVuexDirectories()
    {
        $paths = [
            'resources/js/api',
            'resources/js/store/modules/auth',
        ];

        foreach ($paths as $path) {
            if (!is_dir(base_path($path))) {
                mkdir(base_path($path), 0755, true);
            }
        }
    }

    private static function createVuexFiles()
    {
        $paths = [
            [
                'for' => '/stubs/vue/api/auth.js',
                'to' => 'resources/js/api/auth.js',
            ],[
                'for' => '/stubs/vue/store/index.js',
                'to' => 'resources/js/store/index.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/index.js',
                'to' => 'resources/js/store/modules/auth/index.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/index.js',
                'to' => 'resources/js/store/modules/auth/index.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/actions.js',
                'to' => 'resources/js/store/modules/auth/actions.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/getters.js',
                'to' => 'resources/js/store/modules/auth/getters.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/mutations.js',
                'to' => 'resources/js/store/modules/auth/mutations.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/state.js',
                'to' => 'resources/js/store/modules/auth/state.js',
            ],[
                'for' => '/stubs/vue/store/modules/auth/mutation-types.js',
                'to' => 'resources/js/store/modules/auth/mutation-types.js',
            ],[
                'from' => '/stubs/vue/app.js',
                'to' => 'resources/js/app.js',
            ],
        ];

        foreach ($paths as $path) {
            file_put_contents(
                base_path($path['to']),
                file_get_contents(__DIR__ . $path['for'])
            );
        }
    }
}