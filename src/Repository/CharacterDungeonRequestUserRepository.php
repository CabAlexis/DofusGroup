<?php

namespace App\Repository;

use App\Entity\CharacterDungeonRequestUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterDungeonRequestUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterDungeonRequestUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterDungeonRequestUser[]    findAll()
 * @method CharacterDungeonRequestUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterDungeonRequestUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterDungeonRequestUser::class);
    }

    // /**
    //  * @return CharacterDungeonRequestUser[] Returns an array of CharacterDungeonRequestUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterDungeonRequestUser
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
