<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Mass;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\MilliMeter;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use Elbgoods\LaravelUnitConverter\Units\Mass\Ounce;
use Elbgoods\LaravelUnitConverter\Units\Mass\Pound;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Celsius;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

final class PoundTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Pound::make(1);

        static::assertSame('1.000 lb', $unit->toString());
        static::assertSame('1.000 lb', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'lb',
            'label' => 'pound',
            'type' => 'mass',
            'is_metric' => false,
            'is_imperial' => true,
            'is_usc' => true,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }

    /** @test */
    public function it_converts_from_base(): void
    {
        $unit = KiloGram::make(0.45359237)->to(Pound::class);

        static::assertInstanceOf(Pound::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
