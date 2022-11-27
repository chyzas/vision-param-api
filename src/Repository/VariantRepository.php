<?php

namespace App\Repository;

use App\Entity\Variant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Variant>
 *
 * @method Variant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Variant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Variant[]    findAll()
 * @method Variant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Variant::class);
    }

    public function findVariants(array $parameters)
    {
        $qb = $this->createQueryBuilder('v');

        $qb->select('v')
            ->innerJoin('v.parameterOption', 'po')
            ->innerJoin('po.optionValue', 'ov')
            ->innerJoin('po.parameter', 'p');
        foreach ($parameters as $name => $value) {
            $qb->andWhere('p.name = :name')
                ->andwhere('ov.value = :value')
                ->setParameter('name', $name)
                ->setParameter('value', $value);
        }

        return $qb->getQuery()->execute();
    }

    public function getParameters(array $codes)
    {
        $qb = $this->createQueryBuilder('v');

        $qb->select('p.name, ov.value')
            ->innerJoin('v.parameterOption', 'po')
            ->innerJoin('po.optionValue', 'ov')
            ->innerJoin('po.parameter', 'p')
            ->andWhere('v.code IN (:codes)')
            ->orderBy('ov.value')
            ->groupBy('p.name, ov.value')
            ->setParameter('codes', $codes);

        return $qb->getQuery()->getResult();
    }
}
