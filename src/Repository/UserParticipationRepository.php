<?php

namespace App\Repository;

use App\Entity\UserParticipation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;
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

    public function getUserPartisipationByID($userid){
        $qb = $this->createQueryBuilder('p');
        $qb  
        ->innerJoin('App\Entity\User','u',Join::WITH , ':userid=p.ID_User')
    
        ->setParameter('userid',$userid)
            ;

        dump($qb->getQuery()->getResult());

        return $qb->getQuery()->getResult();

    }
}
