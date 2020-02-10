<?php

namespace CardsGame\Payloads\Games;

use CardsGame\Abstracts\Entity;

interface GameUseCardPayload
{
    public function executor(): ?Entity;

    public function cardId(): string;
}
