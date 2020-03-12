<?php

namespace Elbgoods\LaravelUnitConverter\Units\Power;

use Elbgoods\LaravelUnitConverter\Units\Power;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class Watt extends Power implements Metric
{
    use BaseUnit;

    public const SYMBOL = 'W';
    public const LABEL = 'watt';
}
