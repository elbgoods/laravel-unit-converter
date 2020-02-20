<?php

namespace Elbgoods\LaravelUnitConverter\Enums;

use Elbgoods\LaravelUnitConverter\Concerns\ExtractsUnitInformation;
use PhpUnitConversion\Map\Unit as UnitMap;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\System\USC;
use Spatie\Enum\Enum;
use Spatie\Enum\Exceptions\InvalidNameException;

/**
 * @method static self METRIC()
 * @method static self IMPERIAL()
 * @method static self USC()
 */
class UnitSystemEnum extends Enum
{
    use ExtractsUnitInformation;

    public function getValue(): string
    {
        return strtolower($this->getName());
    }

    public function getUnits(): array
    {
        $unitClasses = UnitMap::get();

        if(!is_array($unitClasses)) {
            return [];
        }

        return collect($unitClasses)
            ->mapWithKeys(function(string $unitClass): array {
                return [$unitClass => $this->extractUnitInformation($unitClass)];
            })
            ->filter(function(array $unit) {
                return $unit['is_'.$this->getValue()];
            })
            ->all();
    }

    public function getUnitsByType(UnitTypeEnum $unitType): array
    {
        return array_filter($this->getUnits(), function(array $unit) use ($unitType) {
            return $unitType->isEqual($unit['type']);
        });
    }

    public function getInterface(): string
    {
        switch($this->getName()) {
            case 'METRIC':
                return Metric::class;
            case 'IMPERIAL':
                return Imperial::class;
            case 'USC':
                return USC::class;
            default:
                throw new InvalidNameException($this->getName(), static::class);
        }
    }
}