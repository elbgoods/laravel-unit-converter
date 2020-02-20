<?php
namespace Elbgoods\LaravelUnitConverter\Units\Area;

use Elbgoods\LaravelUnitConverter\Units\Area;
use PhpUnitConversion\System\Metric;

class SquareCentiMeter extends Area implements Metric
{
    const FACTOR = 0.0001;

    const SYMBOL = 'cm2';
    const LABEL = 'square centimeter';
}
