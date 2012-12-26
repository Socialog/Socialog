<?php

return array(
    'modules' => include __DIR__  . '/modules.config.php',
    'module_listener_options' => array(
        // Module locations
        'module_paths' => array(
            './module',
            './vendor',
        ),
        // Configuration
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.{php,ini}',
            'config/autoload/' . APP_ENVIRONMENT . '/{,*.}{global,local}.{php,ini}',
        ),
//		'config_cache_enabled' => TRUE,
//		'cache_dir'			=> 'data/cache',
//		'config_cache_key'	=> APP_ENVIRONMENT,
    ),
);