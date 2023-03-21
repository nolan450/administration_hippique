<?php

namespace App\Repository;

use App\Entity\AttributsMentaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttributsMentaux>
 *
 * @method AttributsMentaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributsMentaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributsMentaux[]    findAll()
 * @method AttributsMentaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributsMentauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributsMentaux::class);
    }

    public function save(AttributsMentaux $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AttributsMentaux $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AttributsMentaux[] Returns an array of AttributsMentaux objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AttributsMentaux
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
