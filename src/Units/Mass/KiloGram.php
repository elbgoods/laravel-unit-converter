<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Contracts\SI;
use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class KiloGram extends Mass implements Metric, SI
{
    use BaseUnit;

    const SYMBOL = 'kg';
    const LABEL = 'kilogram';
}
