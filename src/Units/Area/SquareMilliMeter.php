<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;

class SquareMilliMeter extends Area implements Metric
{
    public const FACTOR = 0.000001;

    public const SYMBOL = 'mm2';
    public const LABEL = 'square millimeter';
}
