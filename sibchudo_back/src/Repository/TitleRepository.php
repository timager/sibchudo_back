<?php

namespace App\Repository;


use App\Entity\Title;

class TitleRepository extends AbstractRepository
{

    private string $entity = Title::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
