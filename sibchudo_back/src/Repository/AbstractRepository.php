<?php


namespace App\Repository;


abstract class AbstractRepository implements RepositoryInterface
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = pg_connect("host=localhost dbname=admin_sibchudo user=admin_sibchudo password=TimGerVit98*");
    }
}