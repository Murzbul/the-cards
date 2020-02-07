<?php

namespace CardsGame\Payloads\Roles;

interface RoleShowPayload extends RolePayload
{
    public function id(): string;
}
