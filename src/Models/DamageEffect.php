<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;

class DamageEffect implements Effect
{
    use EffectTrait;

    public function __construct()
    {
    }

    public function execute(Entity $executor, ?Entity $player1, ?Entity $player2)
    {
        // TODO: Implement execute() method.
        // $entity->appliedDamage();
    }
}
