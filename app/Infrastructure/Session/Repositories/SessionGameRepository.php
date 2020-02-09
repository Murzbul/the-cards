<?php

namespace App\Infrastructure\Session\Repositories;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;
use CardsGame\Models\Player;
use CardsGame\Repositories\GameRepository;
use Illuminate\Support\Facades\Session;

class SessionGameRepository implements GameRepository
{
    const CURRENT = 'current';

    public function __construct()
    {
    }

    public function getCurrentGame(): ?Game
    {
        return Session::get(static::CURRENT);
    }

    public function save(Game $game)
    {
        Session::put(static::CURRENT, $game);
        Session::save();
    }

    public function getPlayerFromCurrentGame(string $id): Entity
    {
        /** @var Game $game */
        $game = Session::get(static::CURRENT);

        $entity = collect($game->getPlayers())->first(function (Entity $entity) use ($id) {
            return $entity->getId() === $id;
        });

        return $entity;
    }

    public function getPlayerCards(): array
    {
        /** @var Game $game */
        $game = Session::get(static::CURRENT);

        /** @var Player $entity */
        $entity = collect($game->getPlayers())->first();

        $cards = $entity->getCards();

        return $cards;
    }
}
