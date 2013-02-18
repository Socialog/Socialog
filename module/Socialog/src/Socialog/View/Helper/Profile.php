<?php

namespace Socialog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Profile extends AbstractHelper
{
    /**
     * @var \Socialog\Model\Profile
     */
    protected $profile;

    public function __invoke()
    {
        return $this->getProfile();
    }

    /**
     * @return \Socialog\Model\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

}
