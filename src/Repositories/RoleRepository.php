<?php

namespace CardsGame\Repositories;

use CardsGame\Entities\Role;
use Lib\Criteria\Contracts\Criteria;

interface RoleRepository extends ReadRepository
{
    const CLASS_NAME = Role::class;

    public function search(Criteria $criteria);
}
