<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'goaliorememberme_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/goaliorememberme'
            ),
            'goalioremembermedoctrineorm_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/goalioremembermedoctrineorm'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'GoalioRememberMe\Entity'  => 'goaliorememberme_entity',
                    'GoalioRememberMeDoctrineORM\Entity'  => 'goalioremembermedoctrineorm_entity'
                )
            )
        )
    ),
);
