<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Enums;

use Elbgoods\LaravelUnitConverter\Enums\UnitSystemEnum;
use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use PhpUnitConversion\Map as UnitMap;
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
use PhpUnitConversion\Unit\Time;
use PhpUnitConversion\Unit\Time\Day;

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
        foreach($units as $unit) {
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
        foreach($units as $unit) {
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
            ]],
            ['imperial', [
                Yard::class,
                Foot::class,
                Mile::class,
                Pound::class,
                Ounce::class,
            ]],
            ['usc', [
                Yard::class,
                Foot::class,
                Mile::class,
                Pound::class,
                Ounce::class,
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
            ['imperial', 'length', [
                Yard::class,
                Foot::class,
                Mile::class,
            ]],
            ['imperial', 'mass', [
                Pound::class,
                Ounce::class,
            ]],
            ['usc', 'length', [
                Yard::class,
                Foot::class,
                Mile::class,
            ]],
            ['usc', 'mass', [
                Pound::class,
                Ounce::class,
            ]],
        ];
    }
}