<?php

namespace App\Http\Transformers\Entities;

use CardsGame\Models\Player;
use Flugg\Responder\Transformers\Transformer;

class PlayerTransformer extends Transformer
{
    public function transform(Player $player)
    {
        return array_convert_nulls_to_empty([
            'id' => $player->getId(),
            'name' => $player->getName(),
            'health' => $player->getHealth(),
            'shield' => $player->getShield(),
            'cards' => $player->getCards(),
        ]);
    }
}
