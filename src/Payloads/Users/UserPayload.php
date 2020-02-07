<?php

namespace CardsGame\Payloads\Users;

use CardsGame\Entities\User;

interface UserPayload
{
    public function user(): ?User;
}
