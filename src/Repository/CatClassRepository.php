<?php

namespace App\Repository;

use App\Entity\CatClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CatClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatClass[]    findAll()
 * @method CatClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatClass::class);
    }
}
