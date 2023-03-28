<?php

namespace App\Repository;

use App\Entity\TacheAutomatique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TacheAutomatique>
 *
 * @method TacheAutomatique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheAutomatique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheAutomatique[]    findAll()
 * @method TacheAutomatique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheAutomatiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheAutomatique::class);
    }

    public function save(TacheAutomatique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TacheAutomatique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TacheAutomatique[] Returns an array of TacheAutomatique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TacheAutomatique
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
