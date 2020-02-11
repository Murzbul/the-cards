<?php

namespace App\Http\Transformers\Games;

use CardsGame\Models\Card;
use Flugg\Responder\Transformers\Transformer;

class CardTransformer extends Transformer
{
    public function transform(Card $card)
    {
        return array_convert_nulls_to_empty([
            'id' => $card->getId(),
            'name' => $card->getEffect()->getName(),
            'value' => $card->getEffect()->getValue()->getValue(),
        ]);
    }
}
