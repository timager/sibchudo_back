<?php

namespace App\Repository;


use App\Entity\Cat;

class CatRepository extends AbstractRepository
{

    private string $entity = Cat::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
