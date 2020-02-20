<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\System\USC;

class Yard extends Length implements Imperial, USC
{
    const FACTOR = 0.9144;

    const SYMBOL = 'yd';
    const LABEL = 'yard';
}
