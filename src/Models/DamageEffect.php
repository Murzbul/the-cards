<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Attribute;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;
use CardsGame\ValueObjects\DamagePoint;
use CardsGame\ValueObjects\HealthPoint;
use CardsGame\ValueObjects\ShieldPoint;

class DamageEffect implements Effect
{
    use EffectTrait;

    /** @var DamagePoint */
    private $damagePoint;

    public function __construct()
    {
        $this->damagePoint = new DamagePoint();
    }

    public function execute(?Entity $player1, ?Entity $player2, Game $game)
    {
        $healthPoints = $player2->getHealth();
        $shieldPoints = $player2->getShield();

        if ($shieldPoints > 0) {
            $shieldPoints -= $this->damagePoint->getValue();
            $healthPoints += $shieldPoints;
            $shieldPoints = 0;
        } elseif ($shieldPoints === 0) {
            $healthPoints -= $this->damagePoint->getValue();
        }

        $player2->setHealth(new HealthPoint($healthPoints));
        $player2->setShield(new ShieldPoint($shieldPoints));
    }

    public function getValue(): Attribute
    {
        return $this->damagePoint;
    }
}
