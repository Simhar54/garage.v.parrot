<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }


    public function findByFilter($minPrice = null, $maxPrice = null, $kmMin = null, $kmMax = null  ,$minYear = null , $maxYear = null  ): array
    {
        $qb = $this->createQueryBuilder('p');

        if ($minPrice !== null && $minPrice !== '') {
            $qb->andWhere('p.price >= :minPrice')
               ->setParameter('minPrice', $minPrice);
        }
        
        if ($maxPrice !== null && $maxPrice !== '') {
            $qb->andWhere('p.price <= :maxPrice')
               ->setParameter('maxPrice', $maxPrice);
        }
        
        if ($kmMin !== null && $kmMin !== '') {
           $qb->andWhere('p.mileage >= :kmMin')
              ->setParameter('kmMin', $kmMin);
        }
        
 
        if ($kmMax !== null && $kmMax !== '') {
           $qb->andWhere('p.mileage <= :kmMax')
        ->setParameter('kmMax', $kmMax);
        }

        if ($minYear !== null && $minYear !== '') {
           $qb->andWhere('p.year >= :minYear')
           ->setParameter('minYear', $minYear);
        }

        if ($maxYear !== null && $maxYear !== '') {
           $qb->andWhere('p.year <= :maxYear')
           ->setParameter('maxYear', $maxYear);
        }
             

        return $qb->getQuery()->getResult();
        
    }


//    /**
//     * @return Car[] Returns an array of Car objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Car
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
