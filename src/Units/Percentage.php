<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Percentage\Percent;

abstract class Percentage extends Unit
{
    public const TYPE = 13;
    public const BASE_UNIT = Percent::class;
}
