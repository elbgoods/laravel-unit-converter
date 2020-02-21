<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Length\Meter;
use PhpUnitConversion\UnitType;

abstract class Length extends Unit
{
    public const TYPE = UnitType::LENGTH;
    public const BASE_UNIT = Meter::class;
}
