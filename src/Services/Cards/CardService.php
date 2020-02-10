<?php

namespace CardsGame\Services\Cards;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Card;

class CardService
{
    public function __construct()
    {
    }

    public function getEntityCard(Entity $player, string $cardId): Card
    {
        return collect($player->getCards())->filter(function ($card) use ($cardId) {
            /* @var Card $card */
            return $card->getId() === $cardId;
        })->first();
    }
}
