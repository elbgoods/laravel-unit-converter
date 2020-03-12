<?php

namespace Elbgoods\LaravelUnitConverter\Enums;

use Elbgoods\LaravelUnitConverter\Unit;
use Elbgoods\LaravelUnitConverter\UnitForwarder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PhpUnitConversion\Map\Unit as UnitMap;
use PhpUnitConversion\Unit as BaseUnit;
use Spatie\Enum\Enum;

/**
 * @method static self MASS()
 * @method static self LENGTH()
 * @method static self AREA()
 * @method static self VOLUME()
 * @method static self TIME()
 * @method static self TEMPERATURE()
 * @method static self AMOUNT()
 * @method static self LUMINANCE()
 * @method static self LUMINANCE_ANSI()
 * @method static self LUMINOUS_FLUX()
 * @method static self ANGLE()
 * @method static self POWER()
 * @method static self PERCENTAGE()
 */
class UnitTypeEnum extends Enum
{
    protected const MAP_INDEX = [
        'MASS' => 1,
        'LENGTH' => 2,
        'AREA' => 3,
        'VOLUME' => 4,
        'TIME' => 5,
        'TEMPERATURE' => 6,
        'AMOUNT' => 7,
        'LUMINANCE' => 8,
        'LUMINANCE_ANSI' => 9,
        'LUMINOUS_FLUX' => 10,
        'ANGLE' => 11,
        'POWER' => 12,
        'PERCENTAGE' => 13,
    ];

    public function getValue(): string
    {
        return strtolower($this->getName());
    }

    public function getUnitTypeClass(): string
    {
        return 'Elbgoods\\LaravelUnitConverter\\Units\\'.Str::studly($this->getValue());
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
        return UnitForwarder::forwardTo(constant($this->getUnitTypeClass().'::BASE_UNIT'));
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
            ? $value->toBase()
            : $this->createFromBaseUnit($value);

        if (empty($units)) {
            return $value instanceof Unit ? $value : $baseValue;
        }

        $values = Collection::make(array_keys($units))
            ->map(static function (string $unitClass) use ($baseValue): BaseUnit {
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
