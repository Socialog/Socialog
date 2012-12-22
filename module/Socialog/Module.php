<?php

namespace Socialog;

use Zend\EventManager\EventInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface,
    BootstrapListenerInterface
{
    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $config = $app->getConfig();
        
        // Set configuration options
        if ($phpSettings = $config['php_ini']) {
            foreach($phpSettings as $key => $value) {
                ini_set($key, $value);
            }
        }
        
        $sharedEventManager = $sm->get('SharedEventManager');

        // Hook into comments
        $sharedEventManager->attach('theme', 'post.post', function($e) use ($sm) {
            $viewRenderer = $sm->get('ViewRenderer');
            return $viewRenderer->partial('socialog/comment/post', $e->getParams());
        });

        // Hook into comments
        $sharedEventManager->attach('view', 'navigation.render', function($e) use ($sm) {
            /* @var $pageMapper \Socialog\Mapper\PageMapper */
            $pageMapper = $sm->get('socialog_page_mapper');
            $result = "";
            
            foreach ($pageMapper->findAllPages() as $page) {
                $result.= new Theme\Menuitem($page->getTitle(), $e->getTarget()->url('socialog-page', array(
                    'id' => $page->getId(),
                )));
            }
            
            return $result;
        });
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
       return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/view_helpers.config.php';
    }

}
