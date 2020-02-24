<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Foot extends Length implements Imperial, USC
{
    public const FACTOR = 0.3048;

    public const SYMBOL = 'ft';
    public const LABEL = 'foot';
}
