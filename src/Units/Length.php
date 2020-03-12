<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;

abstract class Length extends Unit
{
    public const TYPE = 2;
    public const BASE_UNIT = Meter::class;
}
