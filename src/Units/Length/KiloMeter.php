<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;

class KiloMeter extends Length implements Metric
{
    public const FACTOR = 1000;

    public const SYMBOL = 'km';
    public const LABEL = 'kilometer';
}
