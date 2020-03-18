<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Mile extends Length implements Imperial, USC
{
    public const FACTOR = 1609.344;

    public const SYMBOL = 'mi';
    public const LABEL = 'mile';
}
