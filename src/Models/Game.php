<?php

namespace CardsGame\Models;

use CardsGame\Abstracts\Entity;
use Ramsey\Uuid\Uuid;

class Game
{
    /** @var Uuid */
    private $id;
    /** @var int */
    private $turnsCurrent;
    /** @var int */
    private $turnsLeft;
    /** @var int */
    private $turnsPast;
    /** @var Entity[] */
    private $players;
    /** @var bool */
    private $playSolo;
    /** @var bool */
    private $playerTurn;
    /** @var Entity */
    private $lostTurn;

    public function __construct(Entity $player1, Entity $player2, int $turnsLeft, bool $playSolo)
    {
        $this->id = Uuid::uuid4();
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->turnsLeft = $turnsLeft;
        $this->turnsCurrent = 1;
        $this->turnsPast = 0;
        $this->playSolo = $playSolo;
        $this->playerTurn = true; // Set default, player1 always start first
        $this->lostTurn = null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function getTurnsCurrent(): int
    {
        return $this->turnsCurrent;
    }

    public function getTurnsLeft(): int
    {
        return $this->turnsLeft;
    }

    public function getTurnsPast(): int
    {
        return $this->turnsPast;
    }

    public function getPlaySolo(): bool
    {
        return $this->playSolo;
    }

    public function setLostTurn(Entity $lostTurn)
    {
        $this->lostTurn = $lostTurn;
    }

    public function getLostTurn()
    {
        return $this->lostTurn;
    }

    public function changePlayerTurn(): void
    {
        $this->playerTurn = ! $this->playerTurn;
    }

    public function nextTurn(): ?GameEnd
    {
        --$this->turnsLeft;
        ++$this->turnsCurrent;
        ++$this->turnsPast;

        if ($this->turnsLeft === 0) {
            return new GameEnd();
        }

        return null;
    }

    public function getEntityWithNoHealth(): ?Entity
    {
        $entity = collect($this->players)->filter(function ($player) {
            /* @var Entity $player */
            return $player->getHealth() === 0;
        })->first();

        return $entity;
    }
}
