<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'goaliorememberme_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/goaliorememberme'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'GoalioRememberMe\Entity'  => 'goaliorememberme_entity'
                )
            )
        )
    ),
);
