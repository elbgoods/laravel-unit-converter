<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;

abstract class Mass extends Unit
{
    public const TYPE = 1;
    public const BASE_UNIT = KiloGram::class;
}
