<?php

namespace App\Http\Transformers\Entities;

use CardsGame\Abstracts\Entity;
use Flugg\Responder\Transformers\Transformer;

class EntityTransformer extends Transformer
{
    public function transform(Entity $entity)
    {
        return array_convert_nulls_to_empty([
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'health' => $entity->getHealth(),
            'shield' => $entity->getShield(),
        ]);
    }
}
