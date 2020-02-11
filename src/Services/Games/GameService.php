<?php

namespace CardsGame\Services\Games;

use CardsGame\Abstracts\Entity;
use CardsGame\Factories\GenerateCards;
use CardsGame\Models\Game;
use CardsGame\Models\Player;
use CardsGame\Payloads\Games\GameCreatePayload;
use CardsGame\Payloads\Games\GameEntityStatusPayload;
use CardsGame\Payloads\Games\GameUseCardPayload;
use CardsGame\Repositories\GameRepository;
use CardsGame\Services\Cards\CardService;
use CardsGame\Services\Entities\EntityService;

class GameService
{
    /** @var GameRepository */
    private $repository;
    /** @var EntityService */
    private $entityService;
    /** @var GenerateCards */
    private $generateCards;
    /** @var CardService */
    private $cardService;

    public function __construct(GameRepository $repository,
                                EntityService $entityService,
                                CardService $cardService
    ) {
        $this->repository = $repository;
        $this->entityService = $entityService;
        $this->generateCards = new GenerateCards(4);
        $this->cardService = $cardService;
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

    public function useCard(GameUseCardPayload $payload): Game
    {
        /** @var Game $game */
        $game = $payload->game();
        $cardId = $payload->cardId();
        $player1 = $payload->executor();

        $player2 = collect($game->getPlayers())->filter(function ($player) use ($player1) {
            /* @var Player $player */
            return $player->getId() !== $player1->getId();
        })->first();

        $card = $this->cardService->getEntityCard($player1, $cardId);

        $card->handle($player1, $player2, $game);

        $player1->removeCard($cardId);

        $entity = $game->getEntityWithNoHealth();

        if ($entity) {
            throw new \Exception('Game Over');
        }

        $this->repository->save($game);

        return $game;
    }
}
