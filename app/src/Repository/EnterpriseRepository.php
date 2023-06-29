<?php

namespace App\Repository;

use App\Entity\Enterprise;
use DateInterval;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Enterprise>
 *
 * @method Enterprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enterprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enterprise[]    findAll()
 * @method Enterprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnterpriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enterprise::class);
    }

    public function save(Enterprise $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Enterprise $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function countAll(){
        $queryBuilder = $this->createQueryBuilder('e');
        $queryBuilder
            ->select('count(e.id)');
        $count = $queryBuilder->getQuery()->getSingleScalarResult();
        return $count;
    }
    /**
    //     * @return Enterprise[] Returns an array of Enterprise objects
    //     */
    public function findTodaysNewCompanies(): int
    {
        $queryBuilder = $this->createQueryBuilder('e');
        $queryBuilder
            ->select('count(e.id)')
            ->where($queryBuilder->expr()->eq('e.created_at', ':today'))
            ->setParameter('today', new DateTime('today'));
            return $queryBuilder->getQuery()->getSingleScalarResult();
    }



    public function findNewCompaniesInLastWeek(): int
    {
        $now = new DateTime();
        $startOfWeek = $now->sub(new DateInterval('P1W'))->modify('monday')->format('Y-m-d 00:00:00');
        $endOfWeek = $now->modify('sunday')->format('Y-m-d 23:59:59');

        $queryBuilder = $this->createQueryBuilder('e');
        $queryBuilder
            ->select('count(e.id)')
            ->where($queryBuilder->expr()->between('e.created_at', ':startOfWeek', ':endOfWeek'))
            ->setParameter('startOfWeek', $startOfWeek)
            ->setParameter('endOfWeek', $endOfWeek);
        $count = $queryBuilder->getQuery()->getSingleScalarResult();
        return $count;
    }

//    /**
//     * @return Enterprise[] Returns an array of Enterprise objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Enterprise
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
