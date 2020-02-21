<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
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
use PhpUnitConversion\Map\Unit as UnitMap;

final class UnitTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideAllUnits
     */
    public function it_can_convert_from_and_to_base_unit(string $unitClass): void
    {
        $unit = forward_static_call([$unitClass, 'fromBase'], 1);

        static::assertInstanceOf($unitClass, $unit);
        static::assertIsFloat($unit->getValue());
        static::assertEquals(1, $unit->toBase()->getValue());
    }

    public function provideAllUnits(): array
    {
        return array_map(function(string $unitClass): array {
            return [$unitClass];
        }, [
            CentiMeter::class,
            Meter::class,
            MilliMeter::class,
            Inch::class,
            Yard::class,
            Foot::class,
            KiloGram::class,
            Gram::class,
            Pound::class,
            Ounce::class,
            SquareMeter::class,
            SquareCentiMeter::class,
            SquareMilliMeter::class,
            SquareFoot::class,
            SquareInch::class,
            SquareYard::class,
        ]);
    }
}
