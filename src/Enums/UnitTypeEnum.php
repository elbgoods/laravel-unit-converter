<?php

namespace Elbgoods\LaravelUnitConverter\Enums;

use Elbgoods\LaravelUnitConverter\UnitForwarder;
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
    protected const MAP_INDEX = [
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

        return Collection::make($unitClasses)
            ->mapWithKeys(static function (string $unitClass): array {
                return [$unitClass => (new $unitClass())->toArray()];
            })
            ->all();
    }

    public function getUnitsBySystem(UnitSystemEnum $unitSystem): array
    {
        return array_filter($this->getUnits(), static function (string $unitClass) use ($unitSystem): bool {
            return array_key_exists($unitSystem->getInterface(), class_implements($unitClass));
        }, ARRAY_FILTER_USE_KEY);
    }

    public function getBaseUnit(): UnitForwarder
    {
        return UnitForwarder::build(constant($this->getUnitTypeClass().'::BASE_UNIT'));
    }

    public function getBaseUnitSymbol(): string
    {
        return $this->getBaseUnit()->getSymbol();
    }

    public function getBaseUnitLabel(): string
    {
        return $this->getBaseUnit()->getLabel();
    }

    public function createFromBaseUnit(float $value): Unit
    {
        return $this->getBaseUnit()->make($value, true);
    }

    /**
     * @param float|Unit $value
     * @param UnitSystemEnum|null $unitSystem
     *
     * @return Unit
     */
    public function getNearestUnit($value, ?UnitSystemEnum $unitSystem = null): Unit
    {
        // https://github.com/pimlie/php-unit-conversion/issues/18
        // return forward_static_call([$this->getUnitTypeClass(), 'nearest'], $value, $unitSystem ? $unitSystem->getInterface() : null);

        $units = $unitSystem === null ? $this->getUnits() : $this->getUnitsBySystem($unitSystem);

        $baseValue = $value instanceof Unit
            ? $value->to($this->getBaseUnit()->unitClassName())
            : $this->createFromBaseUnit($value);

        if (empty($units)) {
            return $value instanceof Unit ? $value : $baseValue;
        }

        $values = Collection::make(array_keys($units))
            ->map(static function (string $unitClass) use ($baseValue): Unit {
                return $baseValue->to($unitClass);
            })
            ->sortBy(static function (Unit $unit): float {
                return $unit->getValue();
            });

        $nearest = $values->first(static function (Unit $unit): bool {
            return $unit->getValue() >= 1;
        });

        if ($nearest instanceof Unit) {
            return $nearest;
        }

        return $values->last();
    }
}
