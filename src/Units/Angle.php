<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Angle\Radian;

abstract class Angle extends Unit
{
    public const TYPE = 11;
    public const BASE_UNIT = Radian::class;
}
