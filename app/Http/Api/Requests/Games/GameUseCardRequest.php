<?php

namespace App\Http\Api\Requests\Games;

use CardsGame\Abstracts\Entity;
use CardsGame\Models\Game;
use CardsGame\Payloads\Games\GameUseCardPayload;
use CardsGame\Repositories\GameRepository;
use Illuminate\Http\Request;

class GameUseCardRequest implements GameUseCardPayload
{
    const CARD_ID = 'cardId';
    const ENTITY_ID = 'entityId';

    /** @var Request */
    private $request;
    /** @var Request */
    private $entityId;
    /** @var GameRepository */
    private $repository;

    public function __construct(Request $request, GameRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->entityId = $this->request->route()->parameter(self::ENTITY_ID);
    }

    public function cardId(): string
    {
        return $this->request->get(self::CARD_ID);
    }

    public function executor(): ?Entity
    {
        $entity = $this->repository->getPlayerFromCurrentGame($this->entityId);

        return $entity;
    }

    public function game(): Game
    {
        $game = $this->repository->getCurrentGame();

        return $game;
    }

    public function validate()
    {
        return $this->request->validate([
            static::CARD_ID => 'required|uuid',
        ]);
    }
}
