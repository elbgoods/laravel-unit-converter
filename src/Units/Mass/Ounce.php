<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Ounce extends Mass implements Imperial, USC
{
    public const FACTOR = 1 / 16 * 0.45359237;

    public const SYMBOL = 'oz';
    public const LABEL = 'ounce';
}
