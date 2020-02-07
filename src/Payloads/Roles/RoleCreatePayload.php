<?php

namespace CardsGame\Payloads\Roles;

interface RoleCreatePayload
{
    public function name(): string;

    public function slug(): string;
}
