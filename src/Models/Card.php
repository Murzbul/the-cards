<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Effect;
use Ramsey\Uuid\Uuid;

class Card
{
    /** @var Effect */
    private $effect;
    /** @var Uuid */
    private $id;

    public function __construct(Effect $effect)
    {
        $this->id = Uuid::uuid4();
        $this->effect = $effect;
    }

    public function handle(Entity $executor, ?Entity $player1, ?Entity $player2)
    {
        $this->effect->execute($executor, $player1, $player2);
    }

    public function getId()
    {
        return $this->id->toString();
    }

    public function getEffect(): Effect
    {
        return $this->effect;
    }
}
