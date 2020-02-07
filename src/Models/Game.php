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
    /** @var Entity */
    private $player1;
    /** @var Entity */
    private $player2;
    /** @var bool */
    private $playSolo;

    public function __construct(Entity $player1, Entity $player2, int $turnsLeft, bool $playSolo)
    {
        $this->id = Uuid::uuid4();
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->turnsLeft = $turnsLeft;
        $this->turnsCurrent = 1;
        $this->turnsPast = 0;
        $this->playSolo = $playSolo;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPlayer1(): Entity
    {
        return $this->player1;
    }

    public function getPlayer2(): Entity
    {
        return $this->player2;
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
}
