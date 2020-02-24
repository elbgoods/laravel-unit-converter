<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\Inch;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;

final class InchTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Inch::make(1);

        static::assertSame('1.000 in', $unit->toString());
        static::assertSame('1.000 in', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'in',
            'label' => 'inch',
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
        $unit = Meter::make(0.0254)->to(Inch::class);

        static::assertInstanceOf(Inch::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
