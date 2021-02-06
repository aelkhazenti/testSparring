<?php

namespace App\Repository;

use App\Entity\UserParticipation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserParticipation|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserParticipation|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserParticipation[]    findAll()
 * @method UserParticipation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserParticipationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserParticipation::class);
    }

    // /**
    //  * @return UserParticipation[] Returns an array of UserParticipation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserParticipation
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
