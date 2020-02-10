<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;
use CardsGame\ValueObjects\DamagePoint;

class DamageEffect implements Effect
{
    use EffectTrait;

    /** @var DamagePoint */
    private $damagePoint;

    public function __construct()
    {
        $this->damagePoint = new DamagePoint();
    }

    public function execute(Entity $executor, ?Entity $player1, ?Entity $player2)
    {
        $healthPoints = $player2->getHealth();
        $shieldPoints = $player2->getShield();

        if ($this->damagePoint->getValue() <= 3 and $shieldPoints > 0) {
            // Damage: 3 - Health: 15 - Shield: 5 = Damage: 3 - Health: 15 - Shield: 2
            // Damage: 2 - Health: 15 - Shield: 5 = Damage: 3 - Health: 15 - Shield: 3
            // Damage: 1 - Health: 15 - Shield: 5 = Damage: 3 - Health: 15 - Shield: 4

            // Damage: 3 - Health: 15 - Shield: 3 = Damage: 3 - Health: 15 - Shield: 0
            // Damage: 2 - Health: 15 - Shield: 1 = Damage: 3 - Health: 14 - Shield: 0
            // Damage: 3 - Health: 15 - Shield: 1 = Damage: 3 - Health: 15 - Shield: -2 = Damage: 3 - Health: 13 - Shield: 0

            $shieldPoints -= $this->damagePoint->getValue();

            if ($shieldPoints < 0) {
                $healthPoints += $shieldPoints;
                $shieldPoints = 0;
            }
        } elseif ($this->damagePoint->getValue() > 3) {
        }

        // Damage: 8 - Health: 15 - Shield: 5

        dd($this->damagePoint);
        $this->damagePoint->getValue();
//        $damage = $this->damagePoint->getValue()

//        $healthPoints = $healthPoints - ;

//        $points += $this->healthPoint->getValue();
//
//        $this->healthPoint->setValue($points);
//
//        $player1->setHealth($this->healthPoint);
    }
}
