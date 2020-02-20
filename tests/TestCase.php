<?php

namespace Elbgoods\LaravelUnitConverter\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Elbgoods\LaravelUnitConverter\LaravelUnitConverterServiceProvider;
use PhpUnitConversion\Unit\Length;
use PhpUnitConversion\Unit\Length\CentiMeter;
use PhpUnitConversion\Unit\Length\Foot;
use PhpUnitConversion\Unit\Length\Meter;
use PhpUnitConversion\Unit\Length\Mile;
use PhpUnitConversion\Unit\Length\MilliMeter;
use PhpUnitConversion\Unit\Length\Yard;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Unit\Mass\Gram;
use PhpUnitConversion\Unit\Mass\KiloGram;
use PhpUnitConversion\Unit\Mass\Ounce;
use PhpUnitConversion\Unit\Mass\Pound;

abstract class TestCase extends OrchestraTestCase
{
    public function getEnvironmentSetUp($app)
    {
        $app->make('config')->set('unit-converter.default_units', false);
        $app->make('config')->set('unit-converter.units', [
            Length::class => [
                CentiMeter::class,
                Meter::class,
                MilliMeter::class,

                Yard::class,
                Foot::class,
                Mile::class,
            ],
            Mass::class => [
                KiloGram::class,
                Gram::class,

                Pound::class,
                Ounce::class,
            ],
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelUnitConverterServiceProvider::class,
        ];
    }
}
