<?php

namespace CardsGame\Payloads\Roles;

use Digichange\Entities\Role;

interface RolePayload
{
    public function role(): ?Role;
}
