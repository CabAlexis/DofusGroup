<?php

namespace App\Repository;

use App\Entity\DungeonRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DungeonRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method DungeonRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method DungeonRequest[]    findAll()
 * @method DungeonRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DungeonRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DungeonRequest::class);
    }


    public function findByDungeonName($search)
    {
        $queryBuilder = $this->createQueryBuilder('dungeon_request');

        $queryBuilder->leftJoin('dungeon_request.dungeon', 'dungeon');

        if(!empty($search)) {
            $queryBuilder->where(
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->like('dungeon.name', ':search'),
                )
            );
            $queryBuilder->setParameter('search', "%$search%");
        }

        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }
    // /**
    //  * @return DungeonRequest[] Returns an array of DungeonRequest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DungeonRequest
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
