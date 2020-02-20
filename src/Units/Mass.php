<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use PhpUnitConversion\UnitType;

abstract class Mass extends Unit
{
    const TYPE = UnitType::MASS;
    const BASE_UNIT = KiloGram::class;
}
