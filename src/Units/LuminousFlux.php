<?php

namespace Elbgoods\LaravelUnitConverter\Units;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\Units\LuminousFlux\Lumen;

abstract class LuminousFlux extends Unit
{
    public const TYPE = 10;
    public const BASE_UNIT = Lumen::class;
}
