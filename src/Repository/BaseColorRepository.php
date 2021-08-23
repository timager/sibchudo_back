<?php

namespace App\Repository;

use App\Entity\BaseColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BaseColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaseColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaseColor[]    findAll()
 * @method BaseColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaseColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaseColor::class);
    }
}
