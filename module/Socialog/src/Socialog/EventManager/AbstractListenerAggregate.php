<?php

namespace Socialog\EventManager;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Event Handler
 */
class AbstractListenerAggregate implements 
    ListenerAggregateInterface,
    ServiceLocatorAwareInterface
{
    /**
     * @var array
     */
    private $handlers = array();

    /**
     * @var array
     */
    protected $hooks = array();

    /**
     * @var array
     */
    protected $globalHooks = array();
    
    /**
     * Char for which to search for when defining a priority
     * 
     * @var string
     */
    protected $priorityChar = '@';
   
    /**
     * @var ServiceLocatorInterface
     */
    protected $locator;

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        foreach ($this->hooks as $eventName => $methodName) {
            $priority = 1;
            if (strpos($eventName, $this->priorityChar) !== false) {
                list($eventName, $priority) = explode($this->priorityChar, $eventName);
            }
            $this->handlers[] = $events->attach($eventName, array($this, $methodName), $priority);
        }

        // Hook into sharedEventManager if we have shared hooks
        if (isset($this->globalHooks) && is_array($this->globalHooks)) {
            $sharedEventManager = $events->getSharedManager();
            foreach ($this->globalHooks as $objectName => $events) {
                foreach ($events as $eventName => $methodName) {
                    $priority = 1;
                    if (strpos($eventName, $this->priorityChar) !== false) {
                        list($eventName, $priority) = explode($this->priorityChar, $eventName);
                    }
                    $sharedEventManager->attach($objectName, $eventName, array($this, $methodName), $priority);
                }
            }
        }
    }

    /**
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->handlers as $key => $handler) {
            $events->detach($handler);
            unset($this->handlers[$key]);
        }
    }

    /**
     * set service locator
     *
     * @param ServiceLocatorInterface $locator
     */
    public function setServiceLocator(ServiceLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->locator;
    }
}