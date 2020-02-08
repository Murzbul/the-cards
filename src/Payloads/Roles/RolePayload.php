<?php

namespace CardsGame\Payloads\Roles;

use CardsGame\Entities\Role;

interface RolePayload
{
    public function role(): ?Role;
}
