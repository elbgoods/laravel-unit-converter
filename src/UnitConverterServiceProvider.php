<?php

namespace Elbgoods\LaravelUnitConverter;

use Illuminate\Support\ServiceProvider;
use PhpUnitConversion\Map as UnitMap;
use ReflectionClass;

class UnitConverterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'unit-converter');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('unit-converter.php'),
            ], 'config');
        }

        UnitMap::clear();

        if (config('unit-converter.default_units')) {
            UnitMap::add(__DIR__.'/Units', __NAMESPACE__.'\\Units');
        }

        foreach (config('unit-converter.units') as $unitType => $units) {
            foreach ($units as $path => $namespace) {
                if (is_numeric($path) && class_exists($namespace)) {
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
