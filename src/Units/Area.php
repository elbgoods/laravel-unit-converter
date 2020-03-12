<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;

abstract class Area extends Unit
{
    public const TYPE = 3;
    public const BASE_UNIT = SquareMeter::class;
}
