<?php

namespace CardsGame\Payloads\Games;

interface GameCreatePayload
{
    public function name(): string;

    public function turns(): int;

    public function playSolo(): bool;
}
