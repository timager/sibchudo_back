<?php


namespace App\Search;


use Doctrine\ORM\QueryBuilder;

interface Search
{
    public function buildSearch(QueryBuilder $builder, array $data);

    public function buildSort(QueryBuilder $builder, array $data);

    public function validate(array $data): bool;
}