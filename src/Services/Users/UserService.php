<?php

namespace CardsGame\Services\Users;

use CardsGame\Entities\User;
use CardsGame\Payloads\Users\UserCreatePayload;
use CardsGame\Payloads\Users\UserShowPayload;
use CardsGame\Payloads\Users\UserUpdatePayload;
use CardsGame\Repositories\PersistRepository;
use CardsGame\Repositories\UserRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Lib\Criteria\Contracts\Criteria;

class UserService
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var UserRepository */
    private $repository;

    public function __construct(PersistRepository $persistRepository, UserRepository $repository)
    {
        $this->persistRepository = $persistRepository;
        $this->repository = $repository;
    }

    public function create(UserCreatePayload $payload): User
    {
        $name = $payload->name();
        $email = $payload->email();
        $password = $payload->password();

        $user = new User($name, $email, $password);
        $this->persistRepository->save($user);

        return $user;
    }

    public function update(UserUpdatePayload $payload): User
    {
        $user = $payload->user();

        $user->update($payload);
        $this->persistRepository->save($user);

        return $user;
    }

    public function list(Criteria $criteria): Paginator
    {
        $users = $this->repository->search($criteria);

        return $users;
    }

    public function show(UserShowPayload $payload): User
    {
        $user = $payload->user();

        return $user;
    }

    public function getUser(string $email): User
    {
        /* @var User $user */
        $user = $this->repository->getOneBy(['email' => $email]);

        return $user;
    }
}
