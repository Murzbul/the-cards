<?php

namespace CardsGame\Contracts;

use CardsGame\Abstracts\Entity;

interface Effect
{
    public function execute(Entity $entity);
}
