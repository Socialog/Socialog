<?php

namespace Socialog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AbstractController extends AbstractActionController
{
    /**
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onDispatch(MvcEvent $e)
    {
        $layout = $this->layout();
        $layout->setTemplate('default/layout');
        $layout->bodyCls = '';

        parent::onDispatch($e);
    }
}
