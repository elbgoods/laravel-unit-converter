<?php

namespace Elbgoods\LaravelUnitConverter;

use Elbgoods\LaravelUnitConverter\Contracts\InternationalSystemOfUnits;
use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\Metric;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\BaseUnit as IsBaseUnit;
use PhpUnitConversion\Unit as BaseUnit;

abstract class Unit extends BaseUnit implements Arrayable, Jsonable, JsonSerializable
{
    public function getType(): int
    {
        return constant('static::TYPE');
    }

    public function getBaseUnit(): string
    {
        return constant('static::BASE_UNIT');
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function __toString(): string
    {
        return $this->format();
    }

    public function toArray(): array
    {
        $interfaces = class_implements($this);

        return [
            'value' => $this->getValue(),
            'symbol' => $this->getSymbol(),
            'label' => $this->getLabel(),
            'type' => UnitTypeEnum::make($this->getType())->getValue(),
            'is_metric' => array_key_exists(Metric::class, $interfaces),
            'is_imperial' => array_key_exists(Imperial::class, $interfaces),
            'is_usc' => array_key_exists(USC::class, $interfaces),
            'is_si' => array_key_exists(InternationalSystemOfUnits::class, $interfaces),
            'is_base' => array_key_exists(IsBaseUnit::class, class_uses_recursive($this)),
        ];
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
