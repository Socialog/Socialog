<?php

return array(

    /**
     * Socialog
     */
    'socialog' => array(
        'database' => array(
            'driver' => 'Pdo_Mysql',
            'database' => '',
            'username' => '',
            'password' => ''
        ),
        'cache' => array(
            'name' => 'filesystem',
            'options' => array(
                'cachedir' => 'data/cache',
                'ttl' => 3600,
                'dir_permission' => 0760,
                'file_permission' => 0660,
            ),
        ),
        'frontend' => array(
            'theme' => 'default'
        ),
        'entity_type' => array(
            'Socialog\Entity\Post' => 1,
            'Socialog\Entity\Page' => 2,
        ),
    ),
    
    'php_ini' => array(
        'date.timezone' => 'Europe/Amsterdam',
    ),

    /**
     * Doctrine
     */
    'doctrine' => array(
        'driver' => array(
            'socialog_annotationdriver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Socialog/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Socialog' => 'socialog_annotationdriver',
                )
            ),
        ),
    ),
    
    /**
     * Twig
     */
    'zfctwig' => array(
        'namespaces' => array(
            'theme' => __DIR__ . '/../../../themes/default',
            'base' => __DIR__ . '/../../../themes/base',
        )
    ),

    /**
     * Asset Manager
     */
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'theme' => __DIR__ . '/../../../themes/default/public',
            ),
        ),
    ),

    /**
     * Router
     */
    'router' => array(
        'routes' => array(
            'socialog-blog' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'socialog-blog',
                        'action' => 'home',
                    ),
                ),
            ),

            'socialog-page' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/page/:id',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'socialog-page',
                        'action' => 'view',
                    ),
                ),
            ),

            'socialog-post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/post/:id',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'socialog-post',
                        'action' => 'view',
                    ),
                ),
            ),
        ),
    ),

    /**
     * Controller
     */
    'controllers' => array(
        'invokables' => array(
            'socialog-blog' => 'Socialog\Controller\BlogController',
            'socialog-page' => 'Socialog\Controller\PageController',
            'socialog-post' => 'Socialog\Controller\PostController',
        ),
    ),

    /**
     * ViewManager
     */
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => '@theme/error/404.twig',
        'layout' => 'layout',
        'exception_template' => '@theme/error/index.twig',
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
