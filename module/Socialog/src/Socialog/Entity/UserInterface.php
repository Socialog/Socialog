<?php

namespace Socialog\Entity;

interface UserInterface
{
    public function getId();
    public function getUsername();
    public function getEmail();
    public function getPassword();
}
