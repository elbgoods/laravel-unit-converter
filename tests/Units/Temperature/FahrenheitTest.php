<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Fahrenheit;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

final class FahrenheitTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Fahrenheit::make(1);

        static::assertSame('1.000 °F', $unit->toString());
        static::assertSame('1.000 °F', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => '°F',
            'label' => 'fahrenheit',
            'type' => 'temperature',
            'is_metric' => false,
            'is_imperial' => false,
            'is_usc' => true,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }

    /** @test */
    public function it_converts_from_base(): void
    {
        // zero
        $unit = Kelvin::make((5 / 9) * (0 + 459.67))->to(Fahrenheit::class);
        static::assertInstanceOf(Fahrenheit::class, $unit);
        static::assertSame(0.0, $unit->getValue());

        // water freezing
        $unit = Kelvin::make(273.15)->to(Fahrenheit::class);
        static::assertInstanceOf(Fahrenheit::class, $unit);
        static::assertSame(32.0, $unit->getValue());

        // water boiling
        $unit = Kelvin::make(373.15)->to(Fahrenheit::class);
        static::assertInstanceOf(Fahrenheit::class, $unit);
        static::assertSame(212.0, $unit->getValue());
    }
}
