<?php

namespace Socialog\Controller;

use Zend\View\Model\ViewModel;

/**
 * Page
 */
class PageController extends AbstractController
{
    public function viewAction()
    {
        
        $sl = $this->getServiceLocator();
        $config = $sl->get('Config');
        $renderer = $sl->get('socialog_codemirror_sundownrenderer');
        
        $pageMapper = $sl->get('socialog_page_mapper');

        $viewModel = new ViewModel;
        $viewModel->setTemplate('default/page');
        $viewModel->page = $pageMapper->findById($this->params('id'));

        $layout =  $this->layout();
        $layout->pages = $pageMapper->findAllPages();
        $layout->profile = $config['profile'];

        return $viewModel;
    }
}
