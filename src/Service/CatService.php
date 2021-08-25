<?php


namespace App\Service;

use App\Repository\CatRepository;
use App\Search\CatSearch;
use Doctrine\ORM\QueryBuilder;

class CatService
{

    public function __construct(private CatRepository $repository, private CatSearch $catSearch)
    {
    }

    public function getCats(QueryBuilder $builder, $limit = 10, $offset = 0, $search = [], $sort = [])
    {
        $this->catSearch->buildSearch($builder, $search);
        $this->catSearch->buildSort($builder, $sort);
        $builder->setMaxResults($limit);
        $builder->setFirstResult($offset);
        $data = $builder->select('c')->getQuery()->getResult();

        return $data;
    }

    public function getCount(QueryBuilder $builder, $search = [])
    {
        $this->catSearch->buildSearch($builder, $search);
        return $builder->select('COUNT(c.id)')->getQuery()->getSingleScalarResult();
    }

    public function buildBaseQuery($filters = [])
    {
        $builder = $this->repository->createQueryBuilder('c');
        return $builder;
    }
}