<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Foot extends Length implements Imperial, USC
{
    const FACTOR = 1 / 3;

    const SYMBOL = 'ft';
    const LABEL = 'foot';
}
