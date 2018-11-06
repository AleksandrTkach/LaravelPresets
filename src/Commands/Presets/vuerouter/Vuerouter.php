<?php

namespace Tkach\LaravelPresets\Commands\Presets\Vuerouter;

use Illuminate\Foundation\Console\Presets\Preset;

class Vuerouter extends Preset
{
    public static function install()
    {
        static::updateDependencies();
        static::vueRouterUp();
    }

    protected static function updateDependencies()
    {
        $json = json_decode(file_get_contents(base_path('package.json')));

        if (!isset($json->devDependencies)) {
            $json->devDependencies = (object)[];
        }

        $json->devDependencies->{"vue-router"};
        $json->devDependencies->{"vuex-router-sync"};

        file_put_contents(
            base_path('package.json'),
            json_encode($json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    protected static function vueRouterUp()
    {
        self::dir_create('resources/js/router');

        foreach ($unlinks as $path) {
            self::dir_remove($path);
        }

        file_put_contents(
            base_path('resources/js/router/index.js'),
            file_get_contents(__DIR__ . '/stubs/js/router/index.js')
        );
    }
}