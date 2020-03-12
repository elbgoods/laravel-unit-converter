<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;

abstract class Temperature extends Unit
{
    public const TYPE = 6;
    public const BASE_UNIT = Kelvin::class;
}
