<?php
namespace Elbgoods\LaravelUnitConverter\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Units\Temperature;
use PhpUnitConversion\System\Metric;

class Celsius extends Temperature implements Metric
{
    const ADDITION_PRE = 273.15;

    const SYMBOL = '°C';
    const LABEL = 'celsius';
}
