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
        return $er->findBy(array('user_id' => $userId));
    }

    public function findByIdSerie($userId, $serieId)
    {
        $er = $this->em->getRepository($this->options->getRememberMeEntityClass());
        return $er->findOneBy(array('user_id' => $userId, 'sid' => $serieId));
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
        $er = $this->em->getRepository($this->options->getRememberMeEntityClass());
        return $er->deleteByUid($userId);
    }

    public function removeSerie($userId, $serieId)
    {
        $er = $this->em->getRepository($this->options->getRememberMeEntityClass());
        return $er->deleteByUidAndSid($userId,$serieId);
    }

    public function remove($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
