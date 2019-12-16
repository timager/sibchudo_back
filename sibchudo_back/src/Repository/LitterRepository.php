<?php

namespace App\Repository;


use App\Entity\Litter;

class LitterRepository extends AbstractRepository
{

    private string $entity = Litter::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
