<?php

namespace App\Repository;

use App\Entity\Campnet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Campnet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campnet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campnet[]    findAll()
 * @method Campnet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampnetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campnet::class);
    }

    // /**
    //  * @return Campnet[] Returns an array of Campnet objects
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
    public function findOneBySomeField($value): ?Campnet
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
