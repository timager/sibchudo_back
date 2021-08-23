<?php

namespace App\Repository;

use App\Entity\ColorCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ColorCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorCode[]    findAll()
 * @method ColorCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorCode::class);
    }
}
