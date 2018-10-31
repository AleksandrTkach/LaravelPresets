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
                            { type : The preset type (vuex) }';

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

        if (! in_array($this->argument('type'), ['vuex'])) {
            throw new InvalidArgumentException('Invalid preset. Please use > sudo php artisan vuex');
        }

        return $this->{$this->argument('type')}();
    }

    protected function vuex()
    {
        Presets\Vuex::install();

        $this->info('Vuex scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
