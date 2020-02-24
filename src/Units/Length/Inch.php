<?php

namespace Elbgoods\LaravelUnitConverter\Units\Length;

use Elbgoods\LaravelUnitConverter\Units\Length;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Inch extends Length implements Imperial, USC
{
    public const FACTOR = 0.0254;

    public const SYMBOL = 'in';
    public const LABEL = 'inch';
}
