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
            'adapter' => array(
                'name' => 'apc',
                'options' => array(
                    'ttl' => 3600,
                ),
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
    /**
     * Navigation
     */
    'navigation' => array(
        'socialog' => array(
            'home' => array(
                'label' => 'Blog',
                'route' => 'socialog-blog',
                'pages' => array(
                    'post' => array(
                        'route' => 'socialog-post'
                    ),
                ),
            ),
        ),
    ),
    /**
     * ViewManager
     */
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'default/error/404',
        'layout' => 'default/layout',
        'exception_template' => 'default/error/index',
        'template_path_stack' => array(
            __DIR__ . '/../view',
            'themes',
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
     * Asset Manager
     */
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'theme' => 'themes/default/public',
                'publicdata' => 'data/public',
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
            'socialog-archive' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/archive',
                    'defaults' => array(
                        'controller' => 'socialog-blog',
                        'action' => 'archive',
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
);
