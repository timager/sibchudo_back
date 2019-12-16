<?php

namespace App\Repository;


use App\Entity\Color;

class ColorRepository extends AbstractRepository
{

    private string $entity = Color::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
