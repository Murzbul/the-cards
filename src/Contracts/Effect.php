<?php

namespace CardsGame\Contracts;

use CardsGame\Abstracts\Entity;

interface Effect
{
    public function execute(Entity $executor, ?Entity $player1, ?Entity $player2);

    public function getName();
}
