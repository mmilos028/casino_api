<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class GameGroupOrderRepository extends EntityRepository
{
    /*
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }
    */

    public function filterByUser($user_id) {

        return $this->createQueryBuilder('u')
            ->andWhere('u.user.user_id = :user_id')
            ->setParameter('user_id', $user_id)
            ->getQuery()
            ->getResult();
        /*
        return $this->createQueryBuilder('u')
            ->andWhere('u.user LIKE :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
        */
    }
}