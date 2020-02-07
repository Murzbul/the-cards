<?php

namespace CardsGame\Models;

use Ramsey\Uuid\Uuid;

class GameEnd
{
    /** @var Uuid */
    private $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
