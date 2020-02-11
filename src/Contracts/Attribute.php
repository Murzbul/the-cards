<?php

namespace CardsGame\Contracts;

interface Attribute
{
    public function getValue();

    public function setValue($point);
}
