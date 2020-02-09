<?php

namespace CardsGame\Factories;

use CardsGame\Models\Card;
use CardsGame\Models\DamageEffect;
use CardsGame\Models\HealthEffect;
use CardsGame\Models\HorrorEffect;
use CardsGame\Models\ShieldEffect;

class GenerateCards
{
    /** @var array */
    public $values = [
        DamageEffect::class,
        HealthEffect::class,
        HorrorEffect::class,
        ShieldEffect::class,
    ];
    /** @var int */
    private $amount;
    /** @var array */
    private $cards;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->cards = [];
    }

    public function generate(): array
    {
        for ($i = 1; $i <= $this->amount; ++$i) {
            $classEffect = $this->getRandomEffect();
            $effect = new $classEffect();

            $this->cards[] = new Card($effect);
        }

        return $this->cards;
    }

    private function getRandomEffect(): string
    {
        shuffle($this->values);

        return collect($this->values)->first();
    }
}
