<?php

namespace Socialog\Controller;

use Socialog\Collections\ArrayCollection;
use Socialog\Mapper\PostMapper;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractController
{
    public function homeAction()
    {
        $sl = $this->getServiceLocator();
        $postMapper = $sl->get('socialog_post_mapper');

        $viewModel = new ViewModel;
        $viewModel->setTemplate('default/home');
        $viewModel->posts = $postMapper->findLatestPosts();

        return $viewModel;
    }

    /**
     * Post Archive
     *
     * @return ViewModel
     */
    public function archiveAction()
    {
        $sl = $this->getServiceLocator();

        /* @var $postMapper \Socialog\Mapper\PostMapper */
        $postMapper = $sl->get('socialog_post_mapper');

        $viewModel = new ViewModel;
        $viewModel->setTemplate('default/archive');

        $posts = new ArrayCollection($postMapper->getRepository()->findAll());

        $viewModel->posts = $posts
            // Group by Year
            ->groupBy(
                // Group by Year
                function($element){
                    return $element->getDate()->format('Y');
                },
                // Group by Month
                function($element){
                    return $element->getDate()->format('M');
                });

//        var_dump($viewModel->posts);

        return $viewModel;
    }
}
