<?php

namespace Socialog\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

/**
 * Default navigation factory.
 *
 * @category  Zend
 * @package   Zend_Navigation
 */
class NavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'socialog';
    }
}
