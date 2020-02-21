<?php

namespace Elbgoods\LaravelUnitConverter;

use Illuminate\Support\Traits\ForwardsCalls;

/**
 * @method Unit make($value = null, bool $convertFromBaseUnit = false)
 * @method Unit fromBase(?float $value = null)
 *
 * @mixin Unit
 */
class UnitForwarder
{
    use ForwardsCalls;

    private Unit $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    public static function build(string $unitClass): self
    {
        return new static(new $unitClass());
    }

    public function unitClassName(): string
    {
        return get_class($this->unit);
    }

    public function isInstanceOf(string $unitClass): bool
    {
        return $this->unit instanceof $unitClass;
    }

    public function __call(string $method, array $arguments)
    {
        if(in_array($method, ['make', 'fromBase'])) {
            return forward_static_call_array([get_class($this->unit), $method], $arguments);
        }

        return $this->forwardCallTo($this->unit, $method, $arguments);
    }
}