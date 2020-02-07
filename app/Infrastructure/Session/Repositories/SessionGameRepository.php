<?php

namespace App\Infrastructure\Session\Repositories;

use CardsGame\Models\Game;
use CardsGame\Repositories\GameRepository;
use Illuminate\Support\Facades\Session;

class SessionGameRepository implements GameRepository
{
    const CURRENT = 'current';

    public function __construct()
    {
    }

    public function getCurrentGame(): Game
    {
        return Session::get(static::CURRENT);
    }

    public function save(Game $game)
    {
        Session::put(static::CURRENT, $game);
    }
}
