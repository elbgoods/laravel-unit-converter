<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Metric;

class Gram extends Mass implements Metric
{
    const FACTOR = 1E-3;

    const SYMBOL = 'g';
    const LABEL = 'gram';
}
