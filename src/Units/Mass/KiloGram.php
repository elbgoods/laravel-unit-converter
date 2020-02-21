<?php

namespace Elbgoods\LaravelUnitConverter\Units\Mass;

use Elbgoods\LaravelUnitConverter\Contracts\InternationalSystemOfUnits;
use Elbgoods\LaravelUnitConverter\Units\Mass;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class KiloGram extends Mass implements Metric, InternationalSystemOfUnits
{
    use BaseUnit;

    public const SYMBOL = 'kg';
    public const LABEL = 'kilogram';
}
