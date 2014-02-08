<?php

namespace GoalioRememberMeDoctrineORM\Repository;

use Doctrine\ORM\EntityRepository;

class RememberMe extends EntityRepository {

    public function deleteByUid($uid)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->delete($this->_entityName,'r')
            ->where('r.user_id = :uid')
            ->setParameter('uid', $uid);
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function deleteByUidAndSid($uid,$sid)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->delete($this->_entityName,'r')
            ->where('r.user_id = :uid')
            ->andWhere('r.sid = :sid')
            ->setParameter('uid', $uid)
            ->setParameter('sid', $sid);
        return $qb->getQuery()->getSingleScalarResult();
    }

}
