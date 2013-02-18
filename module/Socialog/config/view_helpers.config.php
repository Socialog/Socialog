<?php

namespace Socialog;

return array(
    'factories' => array(
        'triggerevent' => function($sm) {
            return new View\Helper\TriggerEvent($sm->getServiceLocator());
        },
        'profile' => function($sm) {
            $sm = $sm->getServiceLocator();
            $config = $sm->get('Config');
            $profileHelper = new View\Helper\Profile;
            $profileHelper->setProfile(new Model\Profile($config['profile']));
            return $profileHelper;
        }
    )
);