<?php


namespace App\Search;


use Doctrine\ORM\QueryBuilder;

interface Search
{
    public function buildSearch(QueryBuilder $builder, array $data): void;

    public function buildSort(QueryBuilder $builder, array $data): void;

    public function joinAlias(QueryBuilder $builder, string $alias): void;

    public function validate(array $data): bool;
}