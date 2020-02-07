<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;

class Monster extends Entity
{
    public function __construct(HealthPoint $healthPoint, ShieldPoint $shield, array $cards)
    {
        parent::__construct($healthPoint, $shield, $cards);
    }
}
