<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

/**
 * Class UserProvider
 * @package Renlife\UserBundle\Entity
 */
class UserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        return new \AppBundle\Entity\User($username, null, ['ROLE_USER']);
    }

    /**
     * @param UserInterface $user
     * @return User|UserInterface
     * @throws UnsupportedUserException
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof \AppBundle\Entity\User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'AppBundle\Entity\User';
    }
}