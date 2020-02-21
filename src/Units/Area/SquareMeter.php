<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class SquareMeter extends Area implements Metric
{
    use BaseUnit;

    public const SYMBOL = 'm2';
    public const LABEL = 'square meter';
}
