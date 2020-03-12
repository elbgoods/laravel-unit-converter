<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Power;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Power\KiloWatt;

final class KiloWattTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = KiloWatt::make(1);

        static::assertSame('1.000 kW', $unit->toString());
        static::assertSame('1.000 kW', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'kW',
            'label' => 'kilowatt',
            'type' => 'power',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }
}
