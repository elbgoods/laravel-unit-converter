<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Percentage;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Percentage\Percent;

final class PercentTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Percent::make(1);

        static::assertSame('1.000 %', $unit->toString());
        static::assertSame('1.000 %', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => '%',
            'label' => 'percent',
            'type' => 'percentage',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => true,
        ], $unit->toArray());
    }
}
