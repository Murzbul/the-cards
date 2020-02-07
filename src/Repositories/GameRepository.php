<?php

namespace CardsGame\Repositories;

use CardsGame\Models\Game;

interface GameRepository
{
    const CLASS_NAME = Game::class;

    public function getCurrentGame();

    public function save(Game $game);
}
