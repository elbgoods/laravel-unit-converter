<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Metric;

class Gram extends Mass implements Metric
{
    public const FACTOR = 1E-3;

    public const SYMBOL = 'g';
    public const LABEL = 'gram';
}
