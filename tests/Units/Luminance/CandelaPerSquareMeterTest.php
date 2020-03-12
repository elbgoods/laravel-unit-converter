<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Luminance;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Luminance\CandelaPerSquareMeter;

final class CandelaPerSquareMeterTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = CandelaPerSquareMeter::make(1);

        static::assertSame('1.000 cd/m2', $unit->toString());
        static::assertSame('1.000 cd/m2', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'cd/m2',
            'label' => 'candela per square meter',
            'type' => 'luminance',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => true,
        ], $unit->toArray());
    }
}
