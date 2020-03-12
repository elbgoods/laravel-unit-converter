<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Celsius;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

final class CelsiusTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Celsius::make(1);

        static::assertSame('1.000 °C', $unit->toString());
        static::assertSame('1.000 °C', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => '°C',
            'label' => 'celsius',
            'type' => 'temperature',
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
        $unit = Kelvin::make(274.15)->to(Celsius::class);

        static::assertInstanceOf(Celsius::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
