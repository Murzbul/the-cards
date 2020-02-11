<?php

namespace CardsGame\Payloads\Games;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;

interface GameUseCardPayload
{
    public function executor(): ?Entity;

    public function cardId(): string;

    public function game(): Game;
}
