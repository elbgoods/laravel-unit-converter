<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\MilliMeter;

final class MilliMeterTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = MilliMeter::make(1);

        static::assertSame('1.000 mm', $unit->toString());
        static::assertSame('1.000 mm', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'mm',
            'label' => 'millimeter',
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
        $unit = Meter::make(0.001)->to(MilliMeter::class);

        static::assertInstanceOf(MilliMeter::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
