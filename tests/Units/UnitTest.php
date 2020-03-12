<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Angle\Degree;
use Elbgoods\LaravelUnitConverter\Units\Angle\Radian;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareCentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareFoot;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareInch;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareYard;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Foot;
use Elbgoods\LaravelUnitConverter\Units\Length\Inch;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\MilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Yard;
use Elbgoods\LaravelUnitConverter\Units\Luminance\CandelaPerSquareMeter;
use Elbgoods\LaravelUnitConverter\Units\Luminance\Nit;
use Elbgoods\LaravelUnitConverter\Units\LuminanceAnsi\AnsiLumen;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use Elbgoods\LaravelUnitConverter\Units\Mass\Ounce;
use Elbgoods\LaravelUnitConverter\Units\Mass\Pound;
use Elbgoods\LaravelUnitConverter\Units\Percentage\Percent;
use Elbgoods\LaravelUnitConverter\Units\Power\KiloWatt;
use Elbgoods\LaravelUnitConverter\Units\Power\Watt;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Celsius;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Fahrenheit;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

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

        $unit = forward_static_call([$unitClass, 'make'], $unit);

        static::assertInstanceOf($unitClass, $unit);
        static::assertIsFloat($unit->getValue());
        static::assertEquals(1, $unit->toBase()->getValue());
    }

    public function provideAllUnits(): array
    {
        return array_map(static function (string $unitClass): array {
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
            Celsius::class,
            Fahrenheit::class,
            Kelvin::class,
            CandelaPerSquareMeter::class,
            Nit::class,
            AnsiLumen::class,
            Radian::class,
            Degree::class,
            Watt::class,
            KiloWatt::class,
            Percent::class,
        ]);
    }
}
