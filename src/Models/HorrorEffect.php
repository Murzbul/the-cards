<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use CardsGame\Contracts\Attribute;
use CardsGame\Contracts\Effect;
use CardsGame\Traits\EffectTrait;
use CardsGame\ValueObjects\HorrorPoint;

class HorrorEffect implements Effect
{
    use EffectTrait;

    /** @var HorrorPoint */
    private $horrorPoint;

    public function __construct()
    {
        $this->horrorPoint = new HorrorPoint();
    }

    public function execute(?Entity $player1, ?Entity $player2, Game $game)
    {
        $game->setLostTurn($player2);
    }

    public function getValue(): Attribute
    {
        return $this->horrorPoint;
    }
}
