<?php

use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Application;

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

define('APP_ENVIRONMENT', isset($_SERVER['SERVER_ENV']) ? strtolower($_SERVER['SERVER_ENV']) : 'development');

require 'init_autoloader.php';

Application::init(include __DIR__ . '/../config/application.config.php')->run();