<?php
namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;

class SquareMilliMeter extends Area implements Metric
{
    const FACTOR = 0.000001;

    const SYMBOL = 'mm2';
    const LABEL = 'square millimeter';
}
