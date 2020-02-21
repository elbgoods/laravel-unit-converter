<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\USC;

class SquareYard extends Area implements USC
{
    public const FACTOR = 0.83612736;

    public const SYMBOL = 'yd2';
    public const LABEL = 'square yard';
}
