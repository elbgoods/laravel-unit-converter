<?php

namespace Elbgoods\LaravelUnitConverter\Units\Angle;

use Elbgoods\LaravelUnitConverter\Units\Angle;
use PhpUnitConversion\System\Metric;

class Degree extends Angle implements Metric
{
    public const FACTOR = M_PI / 180;

    public const SYMBOL = '°';
    public const LABEL = 'degree';
}
