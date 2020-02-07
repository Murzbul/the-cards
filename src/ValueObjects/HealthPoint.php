<?php

namespace CardsGame\Models;

use CardsGame\Contracts\Attribute;

class HealthPoint implements Attribute
{
    /** @var int */
    private $point;

    public function __construct()
    {
        $this->point = random_number();
    }
}
