<?php

namespace App\Repository;

use App\Entity\Offers;
use App\Model\SearchData;
use Couchbase\SearchMetaData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offers>
 *
 * @method Offers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offers[]    findAll()
 * @method Offers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offers::class);
    }

    public function save(Offers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Offers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Offers[] Returns an array of Offers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Offers
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function findBySearch(SearchData $searchData): array
    {
        $offers = $this->createQueryBuilder('o')
            ->join('o.status', 's')
            ->where("s.status = 'Validée'");

        if (!empty($searchData)) {
            $offers = $offers
                ->join('o.tags', 't')
                ->andWhere('o.name LIKE :q')
                ->orWhere('o.description LIKE :q')
                ->orWhere('o.city LIKE :q')
                ->orWhere('o.department LIKE :q')
                ->orWhere("t.tag LIKE :q")
                ->setParameter('q', "%{$searchData->q}%");
        }

        if (!empty($searchData->tags)) {
            $offers = $offers
                ->andWhere('t.id IN (:tagsName)')
                ->setParameter('tagsName', $searchData->tags);
        }

        return $offers
            ->getQuery()
            ->getResult();
    }

    public function getOffersByMonth()
    {
        $offersByMonth = [
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
        $results = $this->createQueryBuilder('o')
            ->select('MONTH(o.created_at) as month, count(o.id)')
            ->groupBy('month')
            ->getQuery()
            ->getResult();
        foreach ($results as $result) {
            $offersByMonth[strval($result["month"])] = $result[1];
        }
        return $offersByMonth;
    }

    public function getOffersWithStudentTags(?int $id)
    {
        $queryResult = $this->createQueryBuilder('o')
            ->select("o, count(o) as nbTags")
            ->join("o.tags", "t")
            ->join("t.students", "s")
            ->where('s.id = :id')
            ->andWhere("t MEMBER OF s.tags")
            ->andWhere("t MEMBER OF o.tags")
            ->groupBy("o")
            ->orderBy("nbTags", "desc")
            ->setParameter('id', $id)
            ->getQuery()
            ->setMaxResults(4)
            ->getResult();

        $result = [];
        foreach ($queryResult as $offer) {
            $result[] = $offer[0];
        }

        return $result;
    }
}
