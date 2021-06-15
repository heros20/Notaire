<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Data\SearchData;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\QueryBuilder;
/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    /**
     * recupère les produits en lien avec une recherche
     * @return Annonce[]
     */

    // public function countNbElement()
    // {
    //     $query = $this->createQueryBuilder('e');
     
    //     $query ->select($query->expr()->count('e'));
     
    //     return (int) $query->getQuery()->getSingleScalarResult();
    // }

    public function findSearch(SearchData $search): array
    {
        $query = $this
            ->getSearchQuery($search)->getQuery();
        return $query->getResult();
    }
    /**
     * recupère le prix min et max d'une recherche
     * @return integer[]
     **/

    public function findMinMax(SearchData $search): array
    {
        $results = $this->getSearchQuery($search)
            ->select('MIN(a.price) as min', 'MAX(a.price) as max')
            ->getQuery()
            ->getScalarResult();
        return [(int)$results[0]['min'], (int)$results[0]['max']];
    }

    private function getSearchQuery(SearchData $search): QueryBuilder
    {
        $query = $this
            ->createQueryBuilder('a')
            ->select('c', 'a')
            ->join('a.category', 'c');

        if (!empty($search->min)) {
            $query = $query 
                ->andWhere('a.price >= :min')
                ->setParameter('min', $search->min); 
        }

        if (!empty($search->max)) {
            $query = $query 
                ->andWhere('a.price <= :max')
                ->setParameter('max', $search->max); 
        }
        if (!empty($search->status)) {
            $query = $query 
                ->andWhere('a.status IN (:status)')
                ->setParameter('status', $search->status); 
        }
        if (!empty($search->category)) {
            $query = $query 
                ->andWhere('c.id IN (:category)')
                ->setParameter('category', $search->category); 
        }
        if (!empty($search->ville)) {
            for ($i=0; $i < count($search->ville) ; $i++) { 
                $query = $query 
                    ->andWhere('a.ville IN (:ville)')
                    ->setParameter('ville', $search->ville); 
            }
        }
        if (!empty($search->departement)) {
            for ($i=0; $i < count($search->departement) ; $i++) { 
                $query = $query 
                    ->andWhere('a.departement IN (:departement)')
                    ->setParameter('departement', $search->departement); 
            }
        }
        // dd($search->category);
        return $query ;
    }
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Annonce
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
