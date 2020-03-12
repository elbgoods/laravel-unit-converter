<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\Foot;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;

final class FootTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Foot::make(1);

        static::assertSame('1.000 ft', $unit->toString());
        static::assertSame('1.000 ft', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'ft',
            'label' => 'foot',
            'type' => 'length',
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
        $unit = Meter::make(0.3048)->to(Foot::class);

        static::assertInstanceOf(Foot::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
