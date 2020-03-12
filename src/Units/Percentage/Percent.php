<?php

namespace Elbgoods\LaravelUnitConverter\Units\Percentage;

use Elbgoods\LaravelUnitConverter\Units\Percentage;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class Percent extends Percentage implements Metric
{
    use BaseUnit;

    public const SYMBOL = '%';
    public const LABEL = 'percent';
}
