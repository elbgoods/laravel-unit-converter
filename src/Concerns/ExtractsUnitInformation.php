<?php

namespace Elbgoods\LaravelUnitConverter\Concerns;

use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\System\USC;

trait ExtractsUnitInformation
{
    protected function extractUnitInformation(string $unitClass): array
    {
        $interfaces = class_implements($unitClass);

        return [
            'symbol' => defined($unitClass.'::SYMBOL') ? constant($unitClass.'::SYMBOL') : null,
            'label' => defined($unitClass.'::LABEL') ? constant($unitClass.'::LABEL') : null,
            'factor' => defined($unitClass.'::FACTOR') ? constant($unitClass.'::FACTOR') : 1,
            'type' => defined($unitClass.'::TYPE') ? UnitTypeEnum::make(constant($unitClass.'::TYPE'))->getValue() : null,
            'is_metric' => array_key_exists(Metric::class, $interfaces),
            'is_imperial' => array_key_exists(Imperial::class, $interfaces),
            'is_usc' => array_key_exists(USC::class, $interfaces),
        ];
    }
}