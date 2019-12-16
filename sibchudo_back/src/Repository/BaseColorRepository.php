<?php

namespace App\Repository;


use App\Entity\BaseColor;

class BaseColorRepository extends AbstractRepository
{

    private string $entity = BaseColor::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
