<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\USC;

class SquareFoot extends Area implements USC
{
    public const FACTOR = 0.0929034116133;

    public const SYMBOL = 'ft2';
    public const LABEL = 'square foot';
}
