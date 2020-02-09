<?php

namespace CardsGame\Abstracts;

use CardsGame\Models\Card;
use CardsGame\ValueObjects\HealthPoint;
use CardsGame\ValueObjects\HorrorPoint;
use CardsGame\ValueObjects\ShieldPoint;
use Ramsey\Uuid\Uuid;

abstract class Entity
{
    /** @var string */
    protected $name;
    /** @var HealthPoint */
    protected $healthPoint;
    /** @var ShieldPoint */
    protected $shield;
    /** @var HorrorPoint */
    protected $horror;
    /** @var Card[] */
    protected $cards;
    /** @var Uuid */
    private $id;

    public function __construct(string $name, HealthPoint $healthPoint, ShieldPoint $shield, HorrorPoint $horror, array $cards)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->healthPoint = $healthPoint;
        $this->shield = $shield;
        $this->horror = $horror;
        $this->cards = $cards;
    }

    public function getId(): string
    {
        return $this->id->toString();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->healthPoint->getValue();
    }

    public function getShield(): int
    {
        return $this->shield->getValue();
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}
