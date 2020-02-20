<?php

namespace Elbgoods\LaravelUnitConverter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use PhpUnitConversion\Map as UnitMap;
use ReflectionClass;

class LaravelUnitConverterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'unit-converter');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('unit-converter.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/unit-converter'),
            ], 'lang');
        }

        if(!config('unit-converter.default_units')) {
            UnitMap::clear();
        }

        foreach(config('unit-converter.units') as $unitType => $units) {
            foreach($units as $path => $namespace) {
                if(is_numeric($path) && class_exists($namespace)) {
                    $class = new ReflectionClass($namespace);
                    $path = $class->getFileName();
                    $namespace = $class->getNamespaceName();
                }

                UnitMap::add($path, $namespace, $unitType);
            }
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'unit-converter');
    }
}
