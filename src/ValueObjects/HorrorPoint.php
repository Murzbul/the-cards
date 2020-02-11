<?php

namespace CardsGame\ValueObjects;

use CardsGame\Contracts\Attribute;

class HorrorPoint implements Attribute
{
    /** @var bool */
    private $status;

    public function __construct()
    {
        $this->status = false;
    }

    public function getValue()
    {
        return $this->status;
    }

    public function setValue($status)
    {
        $this->status = $status;
    }
}
