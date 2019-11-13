<?php

namespace App\Repository;


use App\DatabaseConnector\Database;
use App\Entity\TestEntity;
use App\Repository\DataSetter\DefaultDataSetter;

class TestRepository extends AbstractRepository
{

    private $table = "test_table";
    private $entity = TestEntity::class;

    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->getTable();
        $data = Database::getInstance()->makeQuery($query);
        $objects = $this->makeArrayOfEntity(new DefaultDataSetter(), $data);
        return $objects;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
