<?php

namespace Elbgoods\LaravelUnitConverter\Units\Luminance;

use Elbgoods\LaravelUnitConverter\Units\Luminance;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class CandelaPerSquareMeter extends Luminance implements Metric
{
    use BaseUnit;

    public const SYMBOL = 'cd/m2';
    public const LABEL = 'candela per square meter';
}
