<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;
use CardsGame\ValueObjects\HealthPoint;

class HealthEffect implements Effect
{
    use EffectTrait;

    /** @var HealthPoint */
    private $healthPoint;

    public function __construct()
    {
        $this->healthPoint = new HealthPoint();
    }

    public function execute(Entity $executor, ?Entity $player1, ?Entity $player2)
    {
        $points = $player1->getHealth();
        $points += $this->healthPoint->getValue();

        $this->healthPoint->setValue($points);

        $player1->setHealth($this->healthPoint);
    }
}
