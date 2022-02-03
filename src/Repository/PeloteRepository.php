<?php

namespace App\Repository;

use App\Entity\Pelote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pelote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pelote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pelote[]    findAll()
 * @method Pelote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeloteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pelote::class);
    }

    // /**
    //  * @return Pelote[] Returns an array of Pelote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pelote
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
