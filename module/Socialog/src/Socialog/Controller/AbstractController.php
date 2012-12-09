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
        $sm = $this->getServiceLocator();
        
        $layout = $this->layout();
        $layout->pages = $sm->get('socialog_page_mapper')->findAllPages();

        parent::onDispatch($e);
    }
}
