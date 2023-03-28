<?php

namespace App\Repository;

use App\Entity\CentreEquestre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CentreEquestre>
 *
 * @method CentreEquestre|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreEquestre|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreEquestre[]    findAll()
 * @method CentreEquestre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreEquestreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreEquestre::class);
    }

    public function save(CentreEquestre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CentreEquestre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CentreEquestre[] Returns an array of CentreEquestre objects
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

//    public function findOneBySomeField($value): ?CentreEquestre
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
