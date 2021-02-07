<?php

namespace App\Repository;

use App\Entity\Entrainement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\ORM\Query\Expr\Join;
/**
 * @method Entrainement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrainement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrainement[]    findAll()
 * @method Entrainement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrainementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrainement::class);
    }


    public function getEntrainement($userID)
    {
        $qb = $this->createQueryBuilder('e');
        $qb 
        
        ->innerJoin('App\Entity\User','u',Join::WITH , ':userid != e.ID_User')
    
        ->setParameter('userid',$userID)
            ;

        dump($qb->getQuery()->getResult());

        return $qb->getQuery()->getResult();
    }
    
}
