<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Contracts\InternationalSystemOfUnits;
use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class Meter extends Length implements Metric, InternationalSystemOfUnits
{
    use BaseUnit;

    public const SYMBOL = 'm';
    public const LABEL = 'meter';
}
