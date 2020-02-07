<?php

namespace App\Http\Api\Handlers;

use App\Http\Api\Requests\Games\GameCreateRequest;
use App\Http\Responders\MetadataResponder as Responder;
use App\Http\Transformers\Games\GameTransformer;
use CardsGame\Services\Games\GameService;

class GameHandler extends Handler
{
    /** @var Responder */
    private $responder;
    /** @var GameService */
    private $service;

    public function __construct(GameService $service, Responder $responder)
    {
        $this->responder = $responder;
        $this->service = $service;
    }

    public function create(GameCreateRequest $request)
    {
        $request->validate();

        $game = $this->service->create($request);

        return $this->responder->success($game, new GameTransformer())->respond();
    }

    public function show()
    {
        $game = $this->service->show();

        return $this->responder->success($game, new GameTransformer())->respond();
    }
}
