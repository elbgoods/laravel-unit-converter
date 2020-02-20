<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class SquareMeter extends Area implements Metric
{
    use BaseUnit;

    const SYMBOL = 'm2';
    const LABEL = 'square meter';
}
