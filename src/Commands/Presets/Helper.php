<?php

namespace Tkach\LaravelPresets\Commands;


class Helper
{
    public static function dir_create($path)
    {
        if (!is_dir(base_path($path)))
            mkdir(base_path($path), 0755, true);
    }

    public static function dir_remove($path)
    {
        if (file_exists(base_path($path)))
            unlink($path);
    }
}