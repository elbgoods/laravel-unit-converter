<?php

namespace Elbgoods\LaravelUnitConverter\Units\Power;

use Elbgoods\LaravelUnitConverter\Units\Power;
use PhpUnitConversion\System\Metric;

class KiloWatt extends Power implements Metric
{
    public const FACTOR = 1000;

    public const SYMBOL = 'kW';
    public const LABEL = 'kilowatt';
}
