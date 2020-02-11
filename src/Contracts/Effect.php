<?php

namespace CardsGame\Contracts;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;

interface Effect
{
    public function execute(?Entity $player1, ?Entity $player2, Game $game);

    public function getName();

    public function getValue();
}
