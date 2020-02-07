<?php

namespace CardsGame\Abstracts;

use CardsGame\Models\Card;
use CardsGame\Models\HealthPoint;
use CardsGame\Models\ShieldPoint;
use Ramsey\Uuid\Uuid;

abstract class Entity
{
    /** @var HealthPoint */
    protected $healthPoint;
    /** @var ShieldPoint */
    protected $shield;
    /** @var Card[] */
    protected $cards;
    /** @var Uuid */
    private $id;

    public function __construct(HealthPoint $healthPoint, ShieldPoint $shield, array $cards)
    {
        $this->id = Uuid::uuid4();
        $this->healthPoint = $healthPoint;
        $this->shield = $shield;
        $this->cards = $cards;
    }

    public function getId(): string
    {
        return $this->id->toString();
    }
}
