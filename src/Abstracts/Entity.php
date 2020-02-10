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
    protected $shieldPoint;
    /** @var HorrorPoint */
    protected $horrorPoint;
    /** @var Card[] */
    protected $cards;
    /** @var Uuid */
    private $id;

    public function __construct(string $name, HealthPoint $healthPoint, ShieldPoint $shieldPoint, HorrorPoint $horrorPoint, array $cards)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->healthPoint = $healthPoint;
        $this->shieldPoint = $shieldPoint;
        $this->horrorPoint = $horrorPoint;
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

    public function setHealth(HealthPoint $healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    public function getShield(): int
    {
        return $this->shieldPoint->getValue();
    }

    public function setShield(ShieldPoint $shieldPoint)
    {
        $this->shieldPoint = $shieldPoint;
    }

    public function getHorror(): int
    {
        return $this->shieldPoint->getValue();
    }

    public function setHorror(HorrorPoint $horrorPoint)
    {
        $this->horrorPoint = $horrorPoint;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function removeCard(string $id): array
    {
        $this->cards = collect($this->cards)->filter(function ($card) use ($id) {
            /* @var Card $card */
            return $card->getId() !== $id;
        })->values()->toArray();

        return $this->cards;
    }
}
