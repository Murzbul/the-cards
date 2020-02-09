<?php

namespace CardsGame\Repositories;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;

interface GameRepository
{
    const CLASS_NAME = Game::class;

    public function getCurrentGame(): ?Game;

    public function save(Game $game);

    public function getPlayerFromCurrentGame(string $id): Entity;

    public function getPlayerCards(): array;
}
