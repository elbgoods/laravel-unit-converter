<?php
namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class SquareYard extends Area implements USC
{
    const FACTOR = 0.83612736;

    const SYMBOL = 'yd2';
    const LABEL = 'square yard';
}
