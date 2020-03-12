<?php

namespace Elbgoods\LaravelUnitConverter\Units\LuminanceAnsi;

use Elbgoods\LaravelUnitConverter\Units\LuminanceAnsi;
use PhpUnitConversion\Traits\BaseUnit;

class AnsiLumen extends LuminanceAnsi
{
    use BaseUnit;

    public const SYMBOL = 'lm';
    public const LABEL = 'ansi lumen';
}
