<?php

namespace App\Http\Transformers\Games;

use CardsGame\Models\Game;
use Flugg\Responder\Transformers\Transformer;

class GameTransformer extends Transformer
{
    public function transform(Game $game)
    {
        return array_convert_nulls_to_empty([
            'id' => $game->getId(),
            'currentTurns' => $game->getTurnsCurrent(),
            'leftTurns' => $game->getTurnsLeft(),
            'pastTurns' => $game->getTurnsPast(),
            'player1' => $game->getPlayer1()->getId(),
            'player2' => $game->getPlayer2()->getId(),
        ]);
    }
}
