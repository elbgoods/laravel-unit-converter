<?php

namespace Elbgoods\LaravelUnitConverter\Tests;

use Elbgoods\LaravelUnitConverter\LaravelUnitConverterServiceProvider;
use Elbgoods\LaravelUnitConverter\Units\Area;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareCentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareFoot;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareInch;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareYard;
use Elbgoods\LaravelUnitConverter\Units\Length;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Foot;
use Elbgoods\LaravelUnitConverter\Units\Length\Inch;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\MilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Yard;
use Elbgoods\LaravelUnitConverter\Units\Mass;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use Elbgoods\LaravelUnitConverter\Units\Mass\Ounce;
use Elbgoods\LaravelUnitConverter\Units\Mass\Pound;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

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

                Inch::class,
                Yard::class,
                Foot::class,
            ],
            Mass::class => [
                KiloGram::class,
                Gram::class,

                Pound::class,
                Ounce::class,
            ],
            Area::class => [
                SquareMeter::class,
                SquareCentiMeter::class,
                SquareMilliMeter::class,

                SquareFoot::class,
                SquareInch::class,
                SquareYard::class,
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
