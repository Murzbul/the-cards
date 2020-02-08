<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;

class Damage implements Effect
{
    /** @var Effect */
    private $effect;

    public function __construct(Effect $effect)
    {
        $this->effect = $effect;
    }

    public function execute(Entity $entity)
    {
        // TODO: Implement execute() method.
        // $entity->appliedDamage();
    }
}
