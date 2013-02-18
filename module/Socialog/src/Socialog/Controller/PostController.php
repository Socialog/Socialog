<?php

namespace Socialog\Controller;

use Zend\View\Model\ViewModel;

class PostController extends AbstractController
{
    public function viewAction()
    {
        $sl = $this->getServiceLocator();

        $viewModel = new ViewModel;
        $viewModel->setTemplate('default/post');

        /* @var $postMapper PostMapper */
        $postMapper = $sl->get('socialog_post_mapper');

        $id = $this->params('id');

        if (is_numeric($id)) {
            $post = $postMapper->findById($id);
        } else {
            $post = $postMapper->findBySlug($id);
        }

        $viewModel->post = $post;

        return $viewModel;
    }
}
