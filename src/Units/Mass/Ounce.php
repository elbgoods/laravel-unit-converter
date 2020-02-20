<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Contracts\SI;
use Elbgoods\LaravelUnitConverter\Units\Length;
use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\BaseUnit;

class Ounce extends Mass implements Imperial, USC
{
    const FACTOR = 1/16 * 0.45359237;

    const SYMBOL = 'oz';
    const LABEL = 'ounce';
}