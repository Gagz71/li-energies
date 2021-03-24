<?php

namespace App\Repository;

use App\Entity\MessageCustomer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MessageCustomer|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageCustomer|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageCustomer[]    findAll()
 * @method MessageCustomer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageCustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageCustomer::class);
    }

    // /**
    //  * @return MessageCustomer[] Returns an array of MessageCustomer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MessageCustomer
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
