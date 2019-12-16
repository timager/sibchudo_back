<?php

namespace App\Repository;


use App\Entity\Breed;

class BreedRepository extends AbstractRepository
{

    private string $entity = Breed::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
