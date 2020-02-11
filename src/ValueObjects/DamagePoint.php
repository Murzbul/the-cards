<?php

namespace CardsGame\ValueObjects;

use CardsGame\Contracts\Attribute;

class DamagePoint implements Attribute
{
    /** @var int */
    private $point;

    public function __construct()
    {
        $this->point = random_number(1, 10);
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
