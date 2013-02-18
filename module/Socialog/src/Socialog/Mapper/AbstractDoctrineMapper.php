<?php

namespace Socialog\Mapper;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

/**
 * Doctrine Mapper
 * 
 * Provides common doctrine methods
 */
abstract class AbstractDoctrineMapper extends AbstractMapper
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    
    /**
     * @var string
     */
    protected $entityName;

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getDatabase()
    {
        return $this->entityManager->getConnection();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->entityManager->getRepository($this->entityName);
    }
}
