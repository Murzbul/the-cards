<?php

namespace CardsGame\ValueObjects;

use CardsGame\Contracts\Attribute;

class ShieldPoint implements Attribute
{
    /** @var int */
    private $point;

    public function __construct(int $point = null)
    {
        $this->point = $point ? $point : random_number();
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
