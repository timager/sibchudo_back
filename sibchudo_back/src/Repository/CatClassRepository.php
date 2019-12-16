<?php

namespace App\Repository;


use App\Entity\CatClass;

class CatClassRepository extends AbstractRepository
{

    private string $entity = CatClass::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
