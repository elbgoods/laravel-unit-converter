<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Power\Watt;

abstract class Power extends Unit
{
    public const TYPE = 12;
    public const BASE_UNIT = Watt::class;
}
