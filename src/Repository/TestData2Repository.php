<?php

namespace App\Repository;

use App\Entity\TestData2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestData2|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestData2|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestData2[]    findAll()
 * @method TestData2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestData2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestData2::class);
    }

    // /**
    //  * @return TestData2[] Returns an array of TestData2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestData2
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
