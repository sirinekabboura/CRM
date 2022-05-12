<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Tournoi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Tournoi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tournoi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tournoi[]    findAll()
 * @method Tournoi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournoiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
        parent::__construct($registry, Tournoi::class);

    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Tournoi $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Tournoi $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

                                    // ------------------ FILTRAGE
    /**
     * @return PaginationInterface
     */
    public function listProduitByCat(SearchData $search): PaginationInterface

    {
        $query = $this->createQueryBuilder('p')
            ->select('p');

        if (!empty($search->q)) {
            $query = $query
                ->andWhere('p.nomT LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }
        if (!empty($search->nomT)) {
            $query = $query
                ->andWhere('p.id_t IN (:nomT)')
                ->setParameter('nomT', $search->nomT);
        }

        if (!empty($search->emplacementT)) {
            $query = $query
                ->andWhere('p.id_t IN (:emplacementT)')
                ->setParameter('emplacementT', $search->emplacementT);
        }

        return $this->paginator->paginate(
            $query,
            $search->page,
            4);


    }








        // /**
    //  * @return Tournoi[] Returns an array of Tournoi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tournoi
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
