<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;

class CentiMeter extends Length implements Metric
{
    const FACTOR = 0.01;

    const SYMBOL = 'cm';
    const LABEL = 'centimeter';
}
