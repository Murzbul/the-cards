<?php

namespace App\Http\Transformers\Games;

use App\Http\Transformers\Entities\EntityTransformer;
use CardsGame\Models\Game;
use Flugg\Responder\Transformers\Transformer;

class GameTransformer extends Transformer
{
    protected $load = [
        'players' => EntityTransformer::class,
    ];

    public function transform(Game $game)
    {
        return array_convert_nulls_to_empty([
            'id' => $game->getId(),
            'currentTurns' => $game->getTurnsCurrent(),
            'leftTurns' => $game->getTurnsLeft(),
            'pastTurns' => $game->getTurnsPast(),
        ]);
    }

    public function includePlayers(Game $game)
    {
        return $game->getPlayers();
    }
}
