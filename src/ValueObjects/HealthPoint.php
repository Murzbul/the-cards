<?php

namespace CardsGame\ValueObjects;

use CardsGame\Contracts\Attribute;

class HealthPoint implements Attribute
{
    /** @var int */
    private $point;

    public function __construct()
    {
        $this->point = random_number(10, 20);
    }

    public function getValue()
    {
        return $this->point;
    }

    public function setValue(int $point)
    {
        $this->point = $point;
    }
}
