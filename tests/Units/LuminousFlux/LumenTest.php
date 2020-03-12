<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\LuminousFlux;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\LuminousFlux\Lumen;

final class LumenTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Lumen::make(1);

        static::assertSame('1.000 lm', $unit->toString());
        static::assertSame('1.000 lm', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'lm',
            'label' => 'lumen',
            'type' => 'luminous_flux',
            'is_metric' => false,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => true,
        ], $unit->toArray());
    }
}
