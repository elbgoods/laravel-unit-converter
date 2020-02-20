<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Length;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Length\CentiMeter;

final class CentiMeterTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = new CentiMeter(1);

        static::assertSame('1.000 cm', $unit->toString());
        static::assertSame('1.000 cm', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertSame([
            'value' => 1,
            'symbol' => 'cm',
            'label' => 'centimeter',
            'type' => 'length',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }
}
