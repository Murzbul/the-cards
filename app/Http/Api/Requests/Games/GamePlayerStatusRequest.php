<?php

namespace App\Http\Api\Requests\Games;

use CardsGame\Payloads\Games\GameEntityStatusPayload;
use Illuminate\Http\Request;

class GamePlayerStatusRequest implements GameEntityStatusPayload
{
    const ID = 'playerId';

    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function id(): string
    {
        return $this->request->route()->parameter(self::ID);
    }

    public function validate()
    {
        return $this->request->validate([]);
    }
}
