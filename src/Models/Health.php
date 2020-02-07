<?php

namespace CardsGame\Models;

use CardsGame\Contracts\Effect;
use CardsGame\Contracts\Entity;

class Health implements Effect
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
        // $entity->appliedHealth();
    }
}
