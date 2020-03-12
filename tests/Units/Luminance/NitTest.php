<?php

namespace Elbgoods\LaravelUnitConverter\Tests\Units\Luminance;

use Elbgoods\LaravelUnitConverter\Tests\TestCase;
use Elbgoods\LaravelUnitConverter\Units\Luminance\Nit;

final class NitTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_other_formats(): void
    {
        $unit = Nit::make(1);

        static::assertSame('1.000 nt', $unit->toString());
        static::assertSame('1.000 nt', $unit->__toString());
        static::assertJson($unit->toJson());
        static::assertJson(json_encode($unit));
        static::assertEquals([
            'value' => 1,
            'symbol' => 'nt',
            'label' => 'nit',
            'type' => 'luminance',
            'is_metric' => true,
            'is_imperial' => false,
            'is_usc' => false,
            'is_si' => false,
            'is_base' => false,
        ], $unit->toArray());
    }
}
