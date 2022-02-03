<?php

namespace App\Repository;

use App\Entity\LevelSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LevelSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method LevelSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method LevelSkill[]    findAll()
 * @method LevelSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LevelSkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LevelSkill::class);
    }

    // /**
    //  * @return LevelSkill[] Returns an array of LevelSkill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LevelSkill
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
