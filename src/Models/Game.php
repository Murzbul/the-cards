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

    public function __construct(Entity $player1, Entity $player2, int $turnsLeft, bool $playSolo)
    {
        $this->id = Uuid::uuid4();
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->turnsLeft = $turnsLeft;
        $this->turnsCurrent = 1;
        $this->turnsPast = 0;
        $this->playSolo = $playSolo;
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
