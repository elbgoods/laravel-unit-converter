<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\Area\SquareMeter;
use Elbgoods\LaravelUnitConverter\Units\Mass\Gram;
use Elbgoods\LaravelUnitConverter\Units\Mass\KiloGram;
use PhpUnitConversion\UnitType;

abstract class Area extends Unit
{
    const TYPE = UnitType::AREA;
    const BASE_UNIT = SquareMeter::class;
}