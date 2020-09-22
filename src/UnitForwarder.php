<?php

namespace Elbgoods\LaravelUnitConverter;

use Elbgoods\LaravelUnitConverter\Enums\UnitTypeEnum;
use Illuminate\Support\Traits\ForwardsCalls;

/**
 * @method Unit make($value = null, bool $convertFromBaseUnit = false)
 * @method Unit from(float|string|Unit $value)
 * @method Unit fromBase(?float $value = null)
 * @method UnitTypeEnum getType()
 * @method string getSymbol()
 * @method string getLabel()
 *
 * @see Unit
 */
class UnitForwarder
{
    use ForwardsCalls;

    protected Unit $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    public static function forwardTo(string $unitClass): self
    {
        return new static(new $unitClass());
    }

    public function class(): string
    {
        return get_class($this->unit);
    }

    public function isInstanceOf(string $unitClass): bool
    {
        return $this->unit instanceof $unitClass;
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return Unit|int|string|array|mixed
     */
    public function __call(string $method, array $arguments)
    {
        if (in_array($method, ['make', 'from', 'fromBase'])) {
            return forward_static_call_array([get_class($this->unit), $method], $arguments);
        }

        return $this->forwardCallTo($this->unit, $method, $arguments);
    }
}
