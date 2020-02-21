<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Pound extends Mass implements Imperial, USC
{
    public const FACTOR = 0.45359237;

    public const SYMBOL = 'lb';
    public const LABEL = 'pound';
}
