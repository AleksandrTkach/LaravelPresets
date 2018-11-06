<?php

namespace Tkach\LaravelPresets\Commands;

use InvalidArgumentException;
use Illuminate\Console\Command;

class PresetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preset:up
                            { type : The preset type (all, vuex, spa, vuerouter) }';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffolds for easy start new application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), [ 'all', 'vuex', 'spa', 'vuerouter'])) {
            throw new InvalidArgumentException('Invalid preset. Please use > sudo php artisan preset:up all/vuex/spa/vuerouter');
        }

        return $this->{$this->argument('type')}();
    }

    protected function all()
    {
        $this->vuex();
        $this->spa();
        $this->vuerouter();
    }

    protected function vuex()
    {
        Presets\Vuex\Vuex::install();

        $this->info('Vuex scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }

    protected function spa()
    {
        Presets\Spa\Spa::install();

        $this->info('Spa installed successfully.');
    }

    protected function vuerouter()
    {
        Presets\Vuerouter\Vuerouter::install();

        $this->info('Vue-Router scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
