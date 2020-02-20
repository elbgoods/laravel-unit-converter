<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;
use Elbgoods\LaravelUnitConverter\Units\Length\Foot;

final class FootTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = new Foot(1);

        static::assertSame('1.000 ft', $unit->toString());
        static::assertSame('1.000 ft', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertSame([
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
}