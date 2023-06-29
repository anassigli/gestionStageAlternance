<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Student>
 *
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    public function save(Student $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function remove(Student $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


   public function countAll(){
       $queryBuilder = $this->createQueryBuilder('s');
       $queryBuilder
           ->select('count(s.id)');
       $count = $queryBuilder->getQuery()->getSingleScalarResult();
       return $count;
   }
    public function findTodaysNewStudents(): int
    {
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder
            ->select('count(s.id)')
            ->where($queryBuilder->expr()->eq('s.created_at', ':today'))
            ->setParameter('today', new \DateTime('today'));
        $count = $queryBuilder->getQuery()->getSingleScalarResult();
        return $count;
    }


    public function findNewStudentsInLastWeek(): int
    {
        $now = new \DateTime();
        $startOfWeek = $now->sub(new \DateInterval('P1W'))->modify('monday')->format('Y-m-d 00:00:00');
        $endOfWeek = $now->modify('sunday')->format('Y-m-d 23:59:59');

        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder
            ->select('count(s.id)')
            ->where($queryBuilder->expr()->between('s.created_at', ':startOfWeek', ':endOfWeek'))
            ->setParameter('startOfWeek', $startOfWeek)
            ->setParameter('endOfWeek', $endOfWeek);
        $count = $queryBuilder->getQuery()->getSingleScalarResult();
        return $count;
    }


//    /**
//     * @return Student[] Returns an array of Student objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Student
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
