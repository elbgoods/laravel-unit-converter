<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Mass;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;

final class KiloGramTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = KiloGram::make(1);

        static::assertSame('1.000 kg', $unit->toString());
        static::assertSame('1.000 kg', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit->toJson()));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'kg',
            'label' => 'kilogram',
            'type' => 'mass',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => true,
            'is_base' => true,
        ], $unit->toArray());
    }
}
