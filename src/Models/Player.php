<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;

class Player extends Entity
{
    /** @var string */
    private $name;

    public function __construct(string $name, HealthPoint $healthPoint, ShieldPoint $shield, array $cards)
    {
        parent::__construct($healthPoint, $shield, $cards);
        $this->name = $name;
    }
}
