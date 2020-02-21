<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;
use PhpUnitConversion\UnitType;

abstract class Area extends Unit
{
    public const TYPE = UnitType::AREA;
    public const BASE_UNIT = SquareMeter::class;
}
