<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\ValueObjects\HealthPoint;
use CardsGame\ValueObjects\HorrorPoint;
use CardsGame\ValueObjects\ShieldPoint;

class Player extends Entity
{
    public function __construct(string $name, HealthPoint $healthPoint, ShieldPoint $shield, HorrorPoint $horror, array $cards)
    {
        parent::__construct($name, $healthPoint, $shield, $horror, $cards);
    }
}
