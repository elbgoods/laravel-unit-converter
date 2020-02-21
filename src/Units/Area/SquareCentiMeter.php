<?php

namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;

class SquareCentiMeter extends Area implements Metric
{
    public const FACTOR = 0.0001;

    public const SYMBOL = 'cm2';
    public const LABEL = 'square centimeter';
}
