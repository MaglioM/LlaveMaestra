<?php

namespace App\Repository;

use App\Entity\SiteLoginPassword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SiteLoginPassword|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteLoginPassword|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteLoginPassword[]    findAll()
 * @method SiteLoginPassword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteLoginPasswordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteLoginPassword::class);
    }

    // /**
    //  * @return SiteLoginPassword[] Returns an array of SiteLoginPassword objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SiteLoginPassword
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
