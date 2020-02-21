<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;

class MilliMeter extends Length implements Metric
{
    public const FACTOR = 0.001;

    public const SYMBOL = 'mm';
    public const LABEL = 'millimeter';
}
