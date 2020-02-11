<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;
use CardsGame\ValueObjects\ShieldPoint;

class ShieldEffect implements Effect
{
    use EffectTrait;

    /** @var ShieldPoint */
    private $shieldPoint;

    public function __construct()
    {
        $this->shieldPoint = new ShieldPoint();
    }

    public function execute(?Entity $player1, ?Entity $player2, Game $game)
    {
        $points = $player1->getShield();
        $points += $this->shieldPoint->getValue();

        $this->shieldPoint->setValue($points);

        $player1->setShield($this->shieldPoint);
    }

    public function getValue()
    {
        return $this->shieldPoint;
    }
}
