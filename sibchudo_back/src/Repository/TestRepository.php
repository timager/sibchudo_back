<?php

namespace App\Repository;


use App\Entity\TestEntity;

class TestRepository extends AbstractRepository
{

    private $entity = TestEntity::class;


    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
