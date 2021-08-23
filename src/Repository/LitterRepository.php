<?php

namespace App\Repository;

use App\Entity\Litter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Litter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Litter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Litter[]    findAll()
 * @method Litter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LitterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Litter::class);
    }
}
