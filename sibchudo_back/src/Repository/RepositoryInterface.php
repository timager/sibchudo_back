<?php


namespace App\Repository;


interface RepositoryInterface
{
    public function getTable():string;
    public function getEntityClass():string;
}