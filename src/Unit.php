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
use RuntimeException;

abstract class Unit extends BaseUnit implements Arrayable, Jsonable, JsonSerializable
{
    /**
     * @param float|Unit|null $value
     * @param bool $convertFromBaseUnit
     *
     * @return static
     */
    public static function make($value = null, bool $convertFromBaseUnit = false): self
    {
        if ($value instanceof self) {
            $value = $value->toBase()->getValue();
            $convertFromBaseUnit = true;
        }

        return new static($value, $convertFromBaseUnit);
    }

    public static function fromBase(?float $value = null): self
    {
        return new static($value, true);
    }

    public function toBase(): self
    {
        $base = $this->to($this->getBaseUnit()->class());

        if ($base instanceof self) {
            return $base;
        }

        throw new RuntimeException(sprintf('The base unit has to extend [%s].', self::class));
    }

    public function getType(): UnitTypeEnum
    {
        return UnitTypeEnum::make(constant('static::TYPE'));
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function getBaseUnit(): UnitForwarder
    {
        return UnitForwarder::forwardTo(constant('static::BASE_UNIT'));
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function __toString(): string
    {
        return $this->format();
    }

    /**
     * @param int|null $precision
     * @param bool|null $addSymbol
     *
     * @return string
     */
    public function format($precision = null, $addSymbol = null): string
    {
        return parent::format(
            $precision ?? config('unit-converter.formatter.precision', 3),
            $addSymbol ?? config('unit-converter.formatter.add_symbol', true)
        );
    }

    public function toArray(): array
    {
        $interfaces = class_implements($this);

        return [
            'value' => $this->getValue(),
            'symbol' => $this->getSymbol(),
            'label' => $this->getLabel(),
            'type' => $this->getType()->getValue(),
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
