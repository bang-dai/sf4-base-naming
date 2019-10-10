<?php

namespace App\Repository;

use App\Entity\MyArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MyArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method MyArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method MyArticle[]    findAll()
 * @method MyArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MyArticle::class);
    }

    // /**
    //  * @return MyArticle[] Returns an array of MyArticle objects
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
    public function findOneBySomeField($value): ?MyArticle
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
