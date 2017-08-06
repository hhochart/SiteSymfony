<?php


namespace OC\PlatformBundle\Repository;


class ApplicationRepository extends \Doctrine\ORM\EntityRepository
{

    public function getApplicationsWithAnnonce($limit) {
        $qb = $this
            ->createQueryBuilder('a')
            ->innerJoin('a.annonce', 'annonce')
            ->addSelect('annonce')
            ->setMaxResults($limit);


        return $qb->getQuery()->getResult();
    }

}