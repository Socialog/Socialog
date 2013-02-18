<?php

namespace Socialog\Entity;

use Socialog\Model\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

/**
 * User Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends AbstractModel implements EntityInterface, UserInterface
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="email")
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="password")
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(name="username")
     */
    protected $username;

    /**
     * Filterconfig
     */
    protected $inputFilter = array(
        'id' => array(
            'required' => false,
        ),
    );

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}
