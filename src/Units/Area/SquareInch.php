<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\USC;

class SquareInch extends Area implements USC
{
    public const FACTOR = 1 / 1296;

    public const SYMBOL = 'in2';
    public const LABEL = 'square inch';
}
