<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Luminance\CandelaPerSquareMeter;

abstract class Luminance extends Unit
{
    public const TYPE = 8;
    public const BASE_UNIT = CandelaPerSquareMeter::class;
}
