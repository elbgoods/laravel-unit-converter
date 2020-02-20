<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\USC;

class SquareInch extends Area implements USC
{
    const FACTOR = 1 / 1296;

    const SYMBOL = 'in2';
    const LABEL = 'square inch';
}
