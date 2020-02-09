<?php

namespace CardsGame\Traits;

use ReflectionClass;

trait EffectTrait
{
    public function getName(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }
}
