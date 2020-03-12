<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Enums;

use Elbgoods\LaravelUnitConverter\Enums\UnitSystemEnum;
use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareCentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Foot;
use Elbgoods\LaravelUnitConverter\Units\Length\Inch;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\MilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Yard;
use Elbgoods\LaravelUnitConverter\Units\Luminance\CandelaPerSquareMeter;
use Elbgoods\LaravelUnitConverter\Units\LuminanceAnsi\AnsiLumen;
use Elbgoods\LaravelUnitConverter\Units\LuminousFlux\Lumen;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use Elbgoods\LaravelUnitConverter\Units\Mass\Ounce;
use Elbgoods\LaravelUnitConverter\Units\Mass\Pound;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

final class UnitTypeEnumTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideUnitTypeValues
     */
    public function it_can_instantiate_all_types($actual, string $value): void
    {
        $unitType = UnitTypeEnum::make($actual);

        static::assertInstanceOf(UnitTypeEnum::class, $unitType);
        static::assertSame($value, $unitType->getValue());
        static::assertSame(strtoupper($value), $unitType->getName());
    }

    /**
     * @test
     * @dataProvider provideUnitTypeUnits
     */
    public function it_can_get_all_units(string $type, array $units): void
    {
        $unitType = UnitTypeEnum::make($type);

        static::assertCount(count($units), $unitType->getUnits());
        foreach ($units as $unit) {
            static::assertArrayHasKey($unit, $unitType->getUnits());
        }
    }

    /**
     * @test
     * @dataProvider provideUnitTypeUnitsBySystem
     */
    public function it_can_get_all_units_by_system(string $type, string $system, array $units): void
    {
        $unitType = UnitTypeEnum::make($type);
        $unitSystem = UnitSystemEnum::make($system);

        static::assertCount(count($units), $unitType->getUnitsBySystem($unitSystem));
        foreach ($units as $unit) {
            static::assertArrayHasKey($unit, $unitType->getUnitsBySystem($unitSystem));
        }
    }

    /**
     * @test
     * @dataProvider provideUnitTypeBaseUnits
     */
    public function it_can_get_the_base_unit(string $type, string $baseUnitClass, string $baseUnitSymbol, string $baseUnitLabel): void
    {
        $unitType = UnitTypeEnum::make($type);

        static::assertTrue($unitType->getBaseUnit()->isInstanceOf($baseUnitClass));
        static::assertSame($baseUnitSymbol, $unitType->getBaseUnitSymbol());
        static::assertSame($baseUnitLabel, $unitType->getBaseUnitLabel());

        $baseUnit = $unitType->createFromBaseUnit(1.5)->to($baseUnitClass);

        static::assertInstanceOf($baseUnitClass, $baseUnit);
        static::assertSame(1.5, $baseUnit->getValue());
    }

    /**
     * @test
     * @dataProvider provideUnitTypeNearestValues
     */
    public function it_can_get_nearest_unit(string $type, ?string $system, $value, float $expectedValue, string $expectedSymbol): void
    {
        $expected = sprintf('%.3f %s', $expectedValue, $expectedSymbol);

        $unitType = UnitTypeEnum::make($type);

        $nearest = $unitType->getNearestUnit(
            $value,
            $system ? UnitSystemEnum::make($system) : null
        );

        static::assertSame($expected, $nearest->format());
    }

    public function provideUnitTypeValues(): array
    {
        return [
            ['MASS', 'mass'],
            ['mass', 'mass'],

            ['LENGTH', 'length'],
            ['length', 'length'],

            ['AREA', 'area'],
            ['area', 'area'],

            ['VOLUME', 'volume'],
            ['volume', 'volume'],

            ['TIME', 'time'],
            ['time', 'time'],

            ['TEMPERATURE', 'temperature'],
            ['temperature', 'temperature'],

            ['AMOUNT', 'amount'],
            ['amount', 'amount'],

            ['LUMINANCE', 'luminance'],
            ['luminance', 'luminance'],

            ['LUMINANCE_ANSI', 'luminance_ansi'],
            ['luminance_ansi', 'luminance_ansi'],

            ['ANGLE', 'angle'],
            ['angle', 'angle'],

            ['POWER', 'power'],
            ['power', 'power'],

            ['PERCENTAGE', 'percentage'],
            ['percentage', 'percentage'],
        ];
    }

    public function provideUnitTypeUnits(): array
    {
        return [
            ['length', [
                Meter::class,
                CentiMeter::class,
                MilliMeter::class,
                Yard::class,
                Foot::class,
                Inch::class,
            ]],
            ['mass', [
                KiloGram::class,
                Gram::class,
                Pound::class,
                Ounce::class,
            ]],
        ];
    }

    public function provideUnitTypeUnitsBySystem(): array
    {
        return [
            ['length', 'metric', [
                Meter::class,
                CentiMeter::class,
                MilliMeter::class,
            ]],
            ['mass', 'metric', [
                KiloGram::class,
                Gram::class,
            ]],
            ['length', 'imperial', [
                Yard::class,
                Foot::class,
                Inch::class,
            ]],
            ['mass', 'imperial', [
                Pound::class,
                Ounce::class,
            ]],
            ['length', 'usc', [
                Yard::class,
                Foot::class,
                Inch::class,
            ]],
            ['mass', 'usc', [
                Pound::class,
                Ounce::class,
            ]],
        ];
    }

    public function provideUnitTypeBaseUnits(): array
    {
        return [
            ['area', SquareMeter::class, 'm2', 'square meter'],
            ['length', Meter::class, 'm', 'meter'],
            ['luminance', CandelaPerSquareMeter::class, 'cd/m2', 'candela per square meter'],
            ['luminance_ansi', AnsiLumen::class, 'lm', 'ansi lumen'],
            ['luminous_flux', Lumen::class, 'lm', 'lumen'],
            ['mass', KiloGram::class, 'kg', 'kilogram'],
            ['temperature', Kelvin::class, 'K', 'kelvin'],
        ];
    }

    public function provideUnitTypeNearestValues(): array
    {
        return [
            ['length', 'metric', 10, 10, 'm'],
            ['length', 'metric', 1, 1, 'm'],
            ['length', 'metric', 0.1, 10, 'cm'],
            ['length', 'metric', 0.01, 1, 'cm'],
            ['length', 'metric', 0.001, 1, 'mm'],

            ['length', 'metric', new CentiMeter(1), 1, 'cm'],
            ['length', 'metric', new CentiMeter(10), 10, 'cm'],
            ['length', 'metric', new CentiMeter(100), 1, 'm'],
            ['length', 'metric', new CentiMeter(101), 1.01, 'm'],
            ['length', 'metric', new CentiMeter(200), 2, 'm'],
            ['length', 'metric', new MilliMeter(2000), 2, 'm'],
            ['length', 'metric', new MilliMeter(0.1), 0.1, 'mm'],

            ['mass', 'metric', 1, 1, 'kg'],
            ['mass', 'metric', 0.1, 100, 'g'],
            ['mass', 'metric', new Gram(1000), 1, 'kg'],

            ['mass', 'usc', 1, 2.20462262185, 'lb'],
            ['mass', 'usc', new Pound(1 / 16), 1, 'oz'],
            ['mass', 'usc', new Ounce(16), 1, 'lb'],
            ['mass', 'usc', 1, 2.2046226218487757, 'lb'],

            ['area', 'metric', 1, 1, 'm2'],
            ['area', 'metric', 0.1, 1000, 'cm2'],
            ['area', 'metric', new SquareCentiMeter(0.1), 10, 'mm2'],
        ];
    }
}
