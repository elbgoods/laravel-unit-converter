<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use PhpUnitConversion\UnitType;

abstract class Mass extends Unit
{
    public const TYPE = UnitType::MASS;
    public const BASE_UNIT = KiloGram::class;
}
