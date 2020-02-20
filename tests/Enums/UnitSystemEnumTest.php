<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Enums;

use Elbgoods\LaravelUnitConverter\Enums\UnitSystemEnum;
use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use Elbgoods\LaravelUnitConverter\Tests\TestCase;
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
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use Elbgoods\LaravelUnitConverter\Units\Mass\Ounce;
use Elbgoods\LaravelUnitConverter\Units\Mass\Pound;

final class UnitSystemEnumTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideUnitSystemValues
     */
    public function it_can_instantiate_all_systems($actual, string $value): void
    {
        $unitSystem = UnitSystemEnum::make($actual);

        static::assertInstanceOf(UnitSystemEnum::class, $unitSystem);
        static::assertSame($value, $unitSystem->getValue());
        static::assertSame(strtoupper($value), $unitSystem->getName());
    }

    /**
     * @test
     * @dataProvider provideUnitSystemUnits
     */
    public function it_can_get_all_units(string $system, array $units): void
    {
        $unitSystem = UnitSystemEnum::make($system);

        static::assertCount(count($units), $unitSystem->getUnits());
        foreach ($units as $unit) {
            static::assertArrayHasKey($unit, $unitSystem->getUnits());
        }
    }

    /**
     * @test
     * @dataProvider provideUnitSystemUnitsByType
     */
    public function it_can_get_all_units_by_type(string $system, string $type, array $units): void
    {
        $unitSystem = UnitSystemEnum::make($system);
        $unitType = UnitTypeEnum::make($type);

        static::assertCount(count($units), $unitSystem->getUnitsByType($unitType));
        foreach ($units as $unit) {
            static::assertArrayHasKey($unit, $unitSystem->getUnitsByType($unitType));
        }
    }

    public function provideUnitSystemValues(): array
    {
        return [
            ['METRIC', 'metric'],
            ['metric', 'metric'],

            ['IMPERIAL', 'imperial'],
            ['imperial', 'imperial'],

            ['USC', 'usc'],
            ['usc', 'usc'],
        ];
    }

    public function provideUnitSystemUnits(): array
    {
        return [
            ['metric', [
                Meter::class,
                CentiMeter::class,
                MilliMeter::class,
                KiloGram::class,
                Gram::class,
                SquareMeter::class,
                SquareMilliMeter::class,
                SquareCentiMeter::class,
            ]],
            ['imperial', [
                Yard::class,
                Foot::class,
                Inch::class,
                Pound::class,
                Ounce::class,
            ]],
            ['usc', [
                Yard::class,
                Foot::class,
                Inch::class,
                Pound::class,
                Ounce::class,
                SquareFoot::class,
                SquareInch::class,
                SquareYard::class,
            ]],
        ];
    }

    public function provideUnitSystemUnitsByType(): array
    {
        return [
            ['metric', 'length', [
                Meter::class,
                CentiMeter::class,
                MilliMeter::class,
            ]],
            ['metric', 'mass', [
                KiloGram::class,
                Gram::class,
            ]],
            ['metric', 'area', [
                SquareMeter::class,
                SquareMilliMeter::class,
                SquareCentiMeter::class,
            ]],
            ['imperial', 'length', [
                Yard::class,
                Foot::class,
                Inch::class,
            ]],
            ['imperial', 'mass', [
                Pound::class,
                Ounce::class,
            ]],
            ['usc', 'length', [
                Yard::class,
                Foot::class,
                Inch::class,
            ]],
            ['usc', 'mass', [
                Pound::class,
                Ounce::class,
            ]],
            ['usc', 'area', [
                SquareFoot::class,
                SquareInch::class,
                SquareYard::class,
            ]],
        ];
    }
}
