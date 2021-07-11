<?php

namespace App\Repository;

use App\Entity\CatStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CatStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatStatus[]    findAll()
 * @method CatStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatStatus::class);
    }

    // /**
    //  * @return CatStatus[] Returns an array of CatStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CatStatus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
