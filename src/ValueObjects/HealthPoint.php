<?php

namespace CardsGame\ValueObjects;

use CardsGame\Contracts\Attribute;

class HealthPoint implements Attribute
{
    /** @var int */
    private $point;

    public function __construct(int $point = null)
    {
        $this->point = $point ? $point : random_number(10, 20);
    }

    public function getValue()
    {
        return $this->point;
    }

    public function setValue($point)
    {
        $this->point = $point;
    }
}
