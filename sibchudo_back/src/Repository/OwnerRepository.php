<?php

namespace App\Repository;


use App\Entity\Owner;

class OwnerRepository extends AbstractRepository
{

    private string $entity = Owner::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
