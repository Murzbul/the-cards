<?php

namespace App\Http\Api\Handlers;

use App\Http\Api\Requests\Games\GameCreateRequest;
use App\Http\Api\Requests\Games\GameListRequest;
use App\Http\Api\Requests\Games\GameShowRequest;
use App\Http\Api\Requests\Games\GameUpdateRequest;
use App\Http\Responders\MetadataResponder as Responder;
use App\Http\Transformers\Items\ItemTransformer;
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

        $item = $this->service->create($request);

        return $this->responder->success($item, new ItemTransformer())->respond();
    }

    public function list(GameListRequest $request)
    {
        $request->validate();

        $items = $this->service->list($request);

        return $this->responder->success($items, new ItemTransformer())->paginator(adapt_paginator($items, $request));
    }

    public function update(GameUpdateRequest $request)
    {
        $request->validate();

        $item = $this->service->update($request);

        return $this->responder->success($item, new ItemTransformer())->respond();
    }

    public function show(GameShowRequest $request)
    {
        $request->validate();

        $item = $this->service->show($request);

        return $this->responder->success($item, new ItemTransformer())->respond();
    }
}
