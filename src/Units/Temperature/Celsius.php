<?php

namespace Elbgoods\LaravelUnitConverter\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Units\Temperature;
use PhpUnitConversion\System\Metric;

class Celsius extends Temperature implements Metric
{
    public const ADDITION_PRE = 273.15;

    public const SYMBOL = '°C';
    public const LABEL = 'celsius';
}
