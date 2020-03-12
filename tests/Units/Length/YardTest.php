<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use Elbgoods\LaravelUnitConverter\Units\Length\Yard;

final class YardTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Yard::make(1);

        static::assertSame('1.000 yd', $unit->toString());
        static::assertSame('1.000 yd', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'yd',
            'label' => 'yard',
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
        $unit = Meter::make(0.9144)->to(Yard::class);

        static::assertInstanceOf(Yard::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
