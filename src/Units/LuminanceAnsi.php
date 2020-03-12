<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\LuminanceAnsi\AnsiLumen;

abstract class LuminanceAnsi extends Unit
{
    public const TYPE = 9;
    public const BASE_UNIT = AnsiLumen::class;
}
