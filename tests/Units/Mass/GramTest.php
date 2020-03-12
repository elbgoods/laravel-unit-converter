<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Mass;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;

final class GramTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Gram::make(1);

        static::assertSame('1.000 g', $unit->toString());
        static::assertSame('1.000 g', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'g',
            'label' => 'gram',
            'type' => 'mass',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }

    /** @test */
    public function it_converts_from_base(): void
    {
        $unit = KiloGram::make(0.001)->to(Gram::class);

        static::assertInstanceOf(Gram::class, $unit);
        static::assertSame(1.0, $unit->getValue());
    }
}
