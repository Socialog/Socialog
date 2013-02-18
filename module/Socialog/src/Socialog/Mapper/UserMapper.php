<?php

namespace Socialog\Mapper;

/**
 * User Mapper
 */
class UserMapper extends AbstractDoctrineMapper
{
    protected $entityName = 'Socialog\Entity\User';

    /**
     * Retrieve a user by its email
     * 
     * @param string $email
     * @return \Socialog\Entity\User
     */
    public function findByEmail($email)
    {
        return $this->getRepository()->findOneByEmail($email);
    }

    /**
     * @param string $username
     * @return \Socialog\Entity\User
     */
    public function findByUsername($username)
    {
        return $this->getRepository()->findOneByUsername($username);
    }

    /**
     * Find a user by unique id
     * 
     * @param integer $id
     * @return \Socialog\Entity\User
     */
    public function findById($id)
    {
        return $this->getRepository()->find($id);
    }
}
