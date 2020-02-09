<?php

namespace CardsGame\Services\Games;

use CardsGame\Abstracts\Entity;
use CardsGame\Factories\GenerateCards;
use CardsGame\Models\Game;
use CardsGame\Payloads\Games\GameCreatePayload;
use CardsGame\Payloads\Games\GameEntityStatusPayload;
use CardsGame\Repositories\GameRepository;
use CardsGame\Services\Entities\EntityService;

class GameService
{
    /** @var GameRepository */
    private $repository;
    /** @var EntityService */
    private $entityService;
    /** @var GenerateCards */
    private $generateCards;

    public function __construct(GameRepository $repository,
                                EntityService $entityService
    ) {
        $this->repository = $repository;
        $this->entityService = $entityService;
        $this->generateCards = new GenerateCards(4);
    }

    public function create(GameCreatePayload $payload): Game
    {
        $name = $payload->name();
        $turns = $payload->turns();
        $playSolo = $payload->playSolo();

        $cards1 = $this->generateCards->generate();
        $cards2 = $this->generateCards->generate();

        $player1 = $this->entityService->create($name, $cards1, 'Player');
        $player2 = $this->entityService->create('Nazgul', $cards2, 'Monster');

        $game = new Game($player1, $player2, $turns, $playSolo);

        $this->repository->save($game);

        return $game;
    }

    public function show(): ?Game
    {
        return $this->repository->getCurrentGame();
    }

    public function statusPlayer(GameEntityStatusPayload $payload): ?Entity
    {
        $id = $payload->id();

        return $this->repository->getPlayerFromCurrentGame($id);
    }

    public function getPlayerCards(): array
    {
        $cards = $this->repository->getPlayerCards();

        return $cards;
    }
}
