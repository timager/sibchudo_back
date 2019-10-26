<?php

namespace App\Repository;


use App\Entity\TestEntity;
use App\Repository\DataSetter\DefaultDataSetter;

class TestRepository implements RepositoryInterface
{

    private $table = "test_table";
    private $entity = TestEntity::class;

    public function getAll()
    {
        $dbconn = pg_connect("host=localhost dbname=admin_sibchudo user=admin_sibchudo password=TimGerVit98*");
        $query = 'SELECT * FROM ' . $this->getTable();
        $result = pg_query($dbconn, $query);
        $objects = [];
        $dataSetter = new DefaultDataSetter();
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $obj = new $this->entity();
            $dataSetter->setData($line, $obj);
            $objects[] = $obj;
        }
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
