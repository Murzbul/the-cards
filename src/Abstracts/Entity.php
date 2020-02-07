<?php

namespace CardsGame\Abstracts;

use CardsGame\Models\Card;
use CardsGame\Models\HealthPoint;
use CardsGame\Models\ShieldPoint;

abstract class Entity
{
    /** @var HealthPoint */
    protected $healthPoint;
    /** @var ShieldPoint */
    protected $shield;
    /** @var Card[] */
    protected $cards;

    public function __construct(HealthPoint $healthPoint, ShieldPoint $shield, array $cards)
    {
        $this->healthPoint = $healthPoint;
        $this->shield = $shield;
        $this->cards = $cards;
    }
}
