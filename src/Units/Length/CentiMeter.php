<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;

class CentiMeter extends Length implements Metric
{
    public const FACTOR = 0.01;

    public const SYMBOL = 'cm';
    public const LABEL = 'centimeter';
}
