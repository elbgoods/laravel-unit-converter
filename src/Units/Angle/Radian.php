<?php

namespace Elbgoods\LaravelUnitConverter\Units\Angle;

use Elbgoods\LaravelUnitConverter\Units\Angle;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;

class Radian extends Angle implements Metric
{
    use BaseUnit;

    public const SYMBOL = 'rad';
    public const LABEL = 'radian';
}
