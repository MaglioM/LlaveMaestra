<?php

namespace App\Repository;

use App\Entity\SiteLoginUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SiteLoginUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteLoginUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteLoginUser[]    findAll()
 * @method SiteLoginUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteLoginUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteLoginUser::class);
    }

    // /**
    //  * @return SiteLoginUser[] Returns an array of SiteLoginUser objects
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
    public function findOneBySomeField($value): ?SiteLoginUser
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
