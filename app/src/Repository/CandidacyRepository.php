<?php

namespace App\Repository;

use App\Entity\Candidacy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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

    public function getValidatesCandidaciesByMonth(): array
    {
        $candidacyByMonth = [
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "6" => 0,
            "7" => 0,
            "8" => 0,
            "9" => 0,
            "10" => 0,
            "11" => 0,
            "12" => 0
        ];
        $results = $this->createQueryBuilder('c')
            ->select('MONTH(c.created_at) as month, count(c.id)')
            ->join("c.status","s")
            ->where("s.status = 'Validée'")
            ->groupBy('month')
            ->getQuery()
            ->getResult();
        foreach ($results as $result) {
            $candidacyByMonth[strval($result["month"])] = $result[1];
        }
        return $candidacyByMonth;
    }

    public function getCandidaciesByMonth(): array
    {
        $candidacyByMonth = [
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "6" => 0,
            "7" => 0,
            "8" => 0,
            "9" => 0,
            "10" => 0,
            "11" => 0,
            "12" => 0
        ];
        $results = $this->createQueryBuilder('c')
            ->select('MONTH(c.created_at) as month, count(c.id)')
            ->groupBy('month')
            ->getQuery()
            ->getResult();
        foreach ($results as $result) {
            $candidacyByMonth[strval($result["month"])] = $result[1];
        }
        return $candidacyByMonth;
    }

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
