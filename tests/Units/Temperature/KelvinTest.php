<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

final class KelvinTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Kelvin::make(1);

        static::assertSame('1.000 K', $unit->toString());
        static::assertSame('1.000 K', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'K',
            'label' => 'kelvin',
            'type' => 'temperature',
            'is_metric' => false,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => true,
            'is_base' => true,
        ], $unit->toArray());
    }
}
