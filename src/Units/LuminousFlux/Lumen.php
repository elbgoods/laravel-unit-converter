<?php

namespace Elbgoods\LaravelUnitConverter\Units\LuminousFlux;

use Elbgoods\LaravelUnitConverter\Units\LuminousFlux;
use PhpUnitConversion\Traits\BaseUnit;

class Lumen extends LuminousFlux
{
    use BaseUnit;

    public const SYMBOL = 'lm';
    public const LABEL = 'lumen';
}
