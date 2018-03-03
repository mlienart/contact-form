<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * UserFixtures
 */
class UserFixtures extends Fixture {

    /**
     *
     * @var UserPasswordEncoder
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    /**
     * 
     * @return UserPasswordEncoder
     */
    public function getEncoder() {
        return $this->encoder;
    }

    /**
     * 
     * @param ObjectManager $oManager
     */
    public function load(ObjectManager $oManager) {

        // Add user with ROLE_ADMIN
        $oAdmin = new User();
        $oAdmin->setUsername('webmaster');

        $oAdmin->setPassword($this->getEncoder()->encodePassword($oAdmin, 'test'));

        $oAdmin->setEmail('webmaster@gmail.com');

        $oAdmin->setRoles(array('ROLE_ADMIN'));

        $oManager->persist($oAdmin);

        // Add user with ROLE_USER
        $oUser = new User();
        $oUser->setUsername('user');

        $oUser->setPassword($this->getEncoder()->encodePassword($oUser, 'test'));

        $oUser->setEmail('user@gmail.com');

        $oUser->setRoles(array('ROLE_USER'));

        $oManager->persist($oUser);

        $oManager->flush();
    }

}
