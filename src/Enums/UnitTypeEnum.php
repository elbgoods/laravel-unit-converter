<?php

namespace Elbgoods\LaravelUnitConverter\Enums;

use Illuminate\Support\Collection;
use PhpUnitConversion\Map\Unit as UnitMap;
use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;
use Spatie\Enum\Enum;

/**
 * @method static self MASS()
 * @method static self LENGTH()
 * @method static self AREA()
 * @method static self VOLUME()
 * @method static self TIME()
 * @method static self TEMPERATURE()
 * @method static self AMOUNT()
 */
class UnitTypeEnum extends Enum
{
    const MAP_INDEX = [
        'MASS' => UnitType::MASS,
        'LENGTH' => UnitType::LENGTH,
        'AREA' => UnitType::AREA,
        'VOLUME' => UnitType::VOLUME,
        'TIME' => UnitType::TIME,
        'TEMPERATURE' => UnitType::TEMPERATURE,
        'AMOUNT' => UnitType::AMOUNT,
    ];

    public function getValue(): string
    {
        return strtolower($this->getName());
    }

    /**
     * @return string|Unit
     */
    public function getUnitTypeClass(): string
    {
        return 'Elbgoods\\LaravelUnitConverter\\Units\\'.ucfirst($this->getValue());
    }

    public function getUnits(): array
    {
        $unitClasses = UnitMap::byType($this->getIndex());

        if (! is_array($unitClasses)) {
            return [];
        }

        return collect($unitClasses)
            ->mapWithKeys(function (string $unitClass): array {
                return [$unitClass => (new $unitClass)->toArray()];
            })
            ->all();
    }

    public function getUnitsBySystem(UnitSystemEnum $unitSystem): array
    {
        return array_filter($this->getUnits(), function (string $unitClass) use ($unitSystem) {
            return array_key_exists($unitSystem->getInterface(), class_implements($unitClass));
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * @return string|Unit
     */
    public function getBaseUnitClass(): string
    {
        return constant($this->getUnitTypeClass().'::BASE_UNIT');
    }

    public function getBaseUnitSymbol(): string
    {
        return constant($this->getBaseUnitClass().'::SYMBOL');
    }

    public function getBaseUnitLabel(): string
    {
        return constant($this->getBaseUnitClass().'::LABEL');
    }

    public function createFromBaseUnit(float $value): Unit
    {
        $baseUnitClass = $this->getBaseUnitClass();

        return new $baseUnitClass($value, true);
    }

    /**
     * @param float|Unit $value
     * @param UnitSystemEnum|null $unitSystem
     *
     * @return Unit
     */
    public function getNearestUnit($value, ?UnitSystemEnum $unitSystem = null): Unit
    {
        // @todo: https://github.com/pimlie/php-unit-conversion/issues/18
        // return forward_static_call([$this->getUnitTypeClass(), 'nearest'], $value, $unitSystem ? $unitSystem->getInterface() : null);

        $units = $unitSystem === null ? $this->getUnits() : $this->getUnitsBySystem($unitSystem);

        $baseValue = $value instanceof Unit ? $value->to($this->getBaseUnitClass()) : $this->createFromBaseUnit($value);

        if (empty($units)) {
            return $value instanceof Unit ? $value : $baseValue;
        }

        /** @var Collection $values */
        $values = collect(array_keys($units))
            ->map(function (string $unitClass) use ($baseValue): Unit {
                return $baseValue->to($unitClass);
            })
            ->sortBy->getValue();

        $nearest = $values->first(function (Unit $unit): bool {
            return $unit->getValue() >= 1;
        });

        if ($nearest instanceof Unit) {
            return $nearest;
        }

        return $values->last();
    }
}
