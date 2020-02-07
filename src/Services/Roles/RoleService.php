<?php

namespace CardsGame\Services\Roles;

use CardsGame\Entities\Role;
use CardsGame\Entities\User;
use CardsGame\Payloads\Roles\RoleCreatePayload;
use CardsGame\Payloads\Roles\RoleShowPayload;
use CardsGame\Payloads\Roles\RoleUpdatePayload;
use CardsGame\Repositories\PersistRepository;
use CardsGame\Repositories\RoleRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Lib\Criteria\Contracts\Criteria;

class RoleService
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var RoleRepository */
    private $repository;

    public function __construct(PersistRepository $persistRepository, RoleRepository $repository)
    {
        $this->persistRepository = $persistRepository;
        $this->repository = $repository;
    }

    public function create(RoleCreatePayload $payload): Role
    {
        $name = $payload->name();
        $slug = $payload->slug();

        $role = new Role($name, $slug);
        $this->persistRepository->save($role);

        return $role;
    }

    public function update(RoleUpdatePayload $payload): Role
    {
        $role = $payload->role();

        $role->update($payload);
        $this->persistRepository->save($role);

        return $role;
    }

    public function list(Criteria $criteria): Paginator
    {
        $roles = $this->repository->search($criteria);

        return $roles;
    }

    public function show(RoleShowPayload $payload): Role
    {
        $role = $payload->role();

        return $role;
    }

    public function assignRoleToUser(User $user, string $roleSlug): User
    {
        $role = $this->repository->getOneBy(['slug' => $roleSlug]);

        $user->setRole($role);

        $this->persistRepository->save($user);

        return $user;
    }
}
