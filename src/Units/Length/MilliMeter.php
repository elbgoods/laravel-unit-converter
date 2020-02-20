<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;

class MilliMeter extends Length implements Metric
{
    const FACTOR = 0.001;

    const SYMBOL = 'mm';
    const LABEL = 'millimeter';
}
