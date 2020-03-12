<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Power;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Power\Watt;

final class WattTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Watt::make(1);

        static::assertSame('1.000 W', $unit->toString());
        static::assertSame('1.000 W', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'W',
            'label' => 'watt',
            'type' => 'power',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => true,
        ], $unit->toArray());
    }
}
