<?php

namespace CardsGame\Services\Entities;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;
use CardsGame\Models\Monster;
use CardsGame\Models\Player;
use CardsGame\Repositories\GameRepository;
use CardsGame\ValueObjects\HealthPoint;
use CardsGame\ValueObjects\HorrorPoint;
use CardsGame\ValueObjects\ShieldPoint;

class EntityService
{
    const PLAYER = 'Player';
    const MONSTER = 'Monster';

    /** @var GameRepository */
    private $repository;

    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $name, array $cards, string $type): ?Entity
    {
        $entity = null;

        if ($type === static::PLAYER) {
            $entity = new Player($name, new HealthPoint(), new ShieldPoint(), new HorrorPoint(), $cards);
        }

        if ($type === static::MONSTER) {
            $entity = new Monster($name, new HealthPoint(), new ShieldPoint(), new HorrorPoint(), $cards);
        }

        return $entity;
    }

    public function show(): ?Game
    {
        return $this->repository->getCurrentGame();
    }
}
