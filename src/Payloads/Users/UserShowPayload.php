<?php

namespace CardsGame\Payloads\Users;

interface UserShowPayload extends UserPayload
{
    public function id(): string;
}
