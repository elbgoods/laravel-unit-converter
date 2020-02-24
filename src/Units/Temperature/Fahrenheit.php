<?php
namespace Elbgoods\LaravelUnitConverter\Units\Temperature;

use Elbgoods\LaravelUnitConverter\Units\Temperature;
use PhpUnitConversion\System\USC;

class Fahrenheit extends Temperature implements USC
{
    const FACTOR = 5/9;
    const ADDITION_PRE = 459.67;

    const SYMBOL = '°F';
    const LABEL = 'fahrenheit';
}
