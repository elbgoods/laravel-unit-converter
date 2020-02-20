<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Contracts\SI;
use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class Meter extends Length implements Metric, SI
{
    use BaseUnit;

    const SYMBOL = 'm';
    const LABEL = 'meter';
}
