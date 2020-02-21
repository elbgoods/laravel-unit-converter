<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Yard extends Length implements Imperial, USC
{
    public const FACTOR = 0.9144;

    public const SYMBOL = 'yd';
    public const LABEL = 'yard';
}
