<?php


namespace App\Service;

use App\Repository\CatRepository;
use App\Repository\LitterRepository;
use App\Search\CatSearch;
use App\Search\LitterSearch;
use Doctrine\ORM\QueryBuilder;

class LitterService
{

    public function __construct(private LitterRepository $repository, private LitterSearch $litterSearch)
    {
    }

    public function getLitters(QueryBuilder $builder, $limit = 10, $offset = 0, $search = [], $sort = [])
    {
        $this->litterSearch->buildSearch($builder, $search);
        $this->litterSearch->buildSort($builder, $sort);
        $builder->setMaxResults($limit);
        $builder->setFirstResult($offset);
        $data = $builder->select('l')->getQuery()->getResult();

        return $data;
    }

    public function getCount(QueryBuilder $builder, $search = [])
    {
        $this->litterSearch->buildSearch($builder, $search);
        return $builder->select('COUNT(l.id)')->getQuery()->getSingleScalarResult();
    }

    public function buildBaseQuery($filters = [])
    {
        $builder = $this->repository->createQueryBuilder('l');
        return $builder;
    }
}