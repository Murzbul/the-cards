<?php

namespace CardsGame\Payloads\Users;

interface UserCreatePayload
{
    public function name(): string;

    public function email(): string;

    public function password(): string;
}
