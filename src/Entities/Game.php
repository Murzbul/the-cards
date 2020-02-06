<?php

namespace Digichange\Entities;

use Ramsey\Uuid\Uuid;

class Game
{
    /** @var Uuid */
    private $id;
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
