<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\KiloMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;

final class KiloMeterTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = KiloMeter::make(1);

        static::assertSame('1.000 km', $unit->toString());
        static::assertSame('1.000 km', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'km',
            'label' => 'kilometer',
            'type' => 'length',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }

    /** @test */
    public function it_converts_from_base(): void
    {
        $unit = Meter::make(1000)->to(KiloMeter::class);

        static::assertInstanceOf(KiloMeter::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
