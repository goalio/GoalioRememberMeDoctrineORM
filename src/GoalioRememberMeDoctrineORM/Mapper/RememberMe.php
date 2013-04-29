<?php

namespace GoalioRememberMeDoctrineORM\Mapper;

use Doctrine\ORM\EntityManager;
use GoalioRememberMe\Mapper\RememberMe as GoalioRememberMeMapper;
use GoalioRememberMe\Options\ModuleOptions;
use Zend\Stdlib\Hydrator\HydratorInterface;

class RememberMe extends GoalioRememberMeMapper
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \GoalioRememberMe\Options\ModuleOptions
     */
    protected $options;

    public function __construct(EntityManager $em, ModuleOptions $options)
    {
        $this->em      = $em;
        $this->options = $options;
    }

    public function findById($userId)
    {
        $er = $this->em->getRepository($this->options->getRememberMeEntityClass());
        return $er->findBy(array('user' => $userId));
    }

    public function findByIdSerie($userId, $serieId)
    {
        $er = $this->em->getRepository($this->options->getRememberMeEntityClass());
        return $er->findOneBy(array('user' => $userId, 'sid' => $serieId));
    }

    public function updateSerie($entity)
    {
        $return = $this->em->persist($entity);
        $this->em->flush();

        return $return;
    }

    public function createSerie($entity)
    {
        $return = $this->em->persist($entity);
        $this->em->flush();

        return $return;
    }

    public function removeAll($userId)
    {
        $dql = sprintf("DELETE %s u WHERE u.user = %s", $this->options->getRememberMeEntityClass(), $userId);
        $query = $this->em->createQuery($dql);
        $query->getResult();
    }

    public function remove($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    public function removeSerie($userId, $serieId)
    {
        $dql = sprintf("DELETE %s u WHERE u.user = %s AND u.sid = '%s'", $this->options->getRememberMeEntityClass(), $userId, $serieId);
        $query = $this->em->createQuery($dql);
        $query->getResult();
    }
}