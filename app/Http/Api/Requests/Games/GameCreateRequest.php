<?php

namespace App\Http\Api\Requests\Games;

use CardsGame\Payloads\Games\GameCreatePayload;
use Illuminate\Http\Request;

class GameCreateRequest implements GameCreatePayload
{
    const NAME = 'name';
    const TURNS = 'turns';
    const PLAY_SOLO = 'playSolo';

    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function name(): string
    {
        return $this->request->get(self::NAME);
    }

    public function turns(): int
    {
        return $this->request->get(self::TURNS);
    }

    public function playSolo(): bool
    {
        $playSolo = $this->request->get(self::PLAY_SOLO);

        return $playSolo ?? false;
    }

    public function validate()
    {
        return $this->request->validate([
            static::NAME => 'required|max:20',
            static::TURNS => 'required|max:20',
            static::PLAY_SOLO => 'nullable',
        ]);
    }
}
