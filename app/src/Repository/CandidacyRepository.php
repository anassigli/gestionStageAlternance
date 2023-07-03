<?php

namespace App\Repository;

use App\Entity\Candidacy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Response;

/**
 * @extends ServiceEntityRepository<Candidacy>
 *
 * @method Candidacy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidacy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidacy[]    findAll()
 * @method Candidacy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidacyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidacy::class);
    }

    public function save(Candidacy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Candidacy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

/*
    public function getAcceptedStudentsCountByMonth($month): int
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery("
            SELECT COUNT(c.id) as studentCount, 
                CONCAT(DATE_FORMAT(c.created_at, '%Y'), '-', DATE_FORMAT(c.created_at, '%m')) as month
            FROM App\Entity\Candidacy c
            LEFT JOIN c.status s
            WHERE (s.status = :statusName OR s.status IS NULL)
                AND YEAR(c.created_at) = :year
                AND MONTH(c.created_at) = :month
            GROUP BY month
            ORDER BY month DESC
        ");

        $query->setParameter('statusName', 'validée');
        $query->setParameter('year', date('Y'));
        $query->setParameter('month', $month);

        $results = $query->getResult();

        if (!empty($results)) {
            return (int) $results[0]['studentCount'];
        } else {
            return 0;
        }
    }

*/

//    /**
//     * @return Candidacy[] Returns an array of Candidacy objects
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

//    public function findOneBySomeField($value): ?Candidacy
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
