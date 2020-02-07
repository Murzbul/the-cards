<?php

namespace CardsGame\Services\Games;

use CardsGame\Factories\GenerateCard;
use CardsGame\Models\Game;
use CardsGame\Models\HealthPoint;
use CardsGame\Models\Monster;
use CardsGame\Models\Player;
use CardsGame\Models\ShieldPoint;
use CardsGame\Payloads\Games\GameCreatePayload;
use CardsGame\Repositories\GameRepository;

class GameService
{
    /** @var GameRepository */
    private $repository;

    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(GameCreatePayload $payload): Game
    {
        $name = $payload->name();
        $turns = $payload->turns();
        $playSolo = $payload->playSolo();

        $cards = GenerateCard::generate();

        $player1 = new Player($name, new HealthPoint(), new ShieldPoint(), $cards);
        $player2 = new Monster(new HealthPoint(), new ShieldPoint(), $cards);

        $game = new Game($player1, $player2, $turns, $playSolo);

        $this->repository->save($game);

        return $game;
    }

    public function show(): Game
    {
        return $this->repository->getCurrentGame();
    }
}
