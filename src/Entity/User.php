<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable {

    const ROLE_DEFAULT = 'ROLE_USER';

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * 
     */
    public function __construct() {
        $this->isActive = true;
    }

    /**
     * 
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * 
     * @param string $sUsername
     * @return $this
     */
    public function setUsername($sUsername) {
        $this->username = $sUsername;

        return $this;
    }

    /**
     * 
     * @return null
     */
    public function getSalt() {
        // not needed using bcrypt 
        return null;
    }

    /**
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * 
     * @param string $sPassword
     * @return $this
     */
    public function setPassword($sPassword) {
        $this->password = $sPassword;

        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * 
     * @param string $sEmail
     * @return $this
     */
    public function setEmail($sEmail) {
        $this->email = $sEmail;

        return $this;
    }

    /**
     * 
     * @return array
     */
    public function getRoles() {
        $aRoles = $this->roles;

        // Make sure to have at least one role
        $aRoles[] = self::ROLE_DEFAULT;

        return array_unique($aRoles);
    }

    /**
     * 
     * @param string $sRole
     * @return $this
     */
    public function addRole($sRole) {
        $sCurrentRole = strtoupper($sRole);
        if ($sCurrentRole === self::ROLE_DEFAULT) {
            return $this;
        }

        if (!in_array($sCurrentRole, $this->roles, true)) {
            $this->roles[] = $sCurrentRole;
        }

        return $this;
    }

    /**
     * 
     * @param array $aRoles
     * @return $this
     */
    public function setRoles(array $aRoles) {
        $this->roles = array();

        foreach ($aRoles as $sRole) {
            $this->addRole($sRole);
        }

        return $this;
    }

    /**
     * 
     */
    public function eraseCredentials() {
        
    }

    /**
     * 
     * @return string
     */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
        ));
    }

    /**
     * 
     * @param string $serialized
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->password,
                $this->isActive,
                ) = unserialize($serialized);
    }

    /**
     * 
     * @return boolean
     */
    public function isAccountNonExpired() {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    public function isAccountNonLocked() {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    public function isCredentialsNonExpired() {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    public function isEnabled() {
        return $this->isActive;
    }

}
