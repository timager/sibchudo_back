<?php

namespace App\Repository;


use App\Entity\ColorCode;

class ColorCodeRepository extends AbstractRepository
{

    private string $entity = ColorCode::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
