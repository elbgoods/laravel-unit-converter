<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\USC;

class SquareFoot extends Area implements USC
{
    const FACTOR = 0.0929034116133;

    const SYMBOL = 'ft2';
    const LABEL = 'square foot';
}
