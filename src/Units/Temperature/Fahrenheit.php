<?php

namespace Elbgoods\LaravelUnitConverter\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Units\Temperature;
use PhpUnitConversion\System\USC;

class Fahrenheit extends Temperature implements USC
{
    public const FACTOR = 5 / 9;
    public const ADDITION_PRE = 459.67;

    public const SYMBOL = '°F';
    public const LABEL = 'fahrenheit';
}
