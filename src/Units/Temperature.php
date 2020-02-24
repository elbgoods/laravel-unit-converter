<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Temperature\Kelvin;
use PhpUnitConversion\UnitType;

abstract class Temperature extends Unit
{
    public const TYPE = UnitType::TEMPERATURE;
    public const BASE_UNIT = Kelvin::class;
}
