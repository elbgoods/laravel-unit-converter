<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Inch extends Length implements Imperial, USC
{
    const FACTOR = 1 / 36;

    const SYMBOL = 'in';
    const LABEL = 'inch';
}
