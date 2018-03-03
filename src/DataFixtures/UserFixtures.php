<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture {

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function getEncoder() {
        return $this->encoder;
    }

    public function load(ObjectManager $manager) {
        $admin = new User();
        $admin->setUsername('webmaster');

        $admin->setPassword($this->getEncoder()->encodePassword($admin, 'test'));

        $admin->setEmail('webmaster@gmail.com');

        $admin->setRoles(array('ROLE_ADMIN'));

        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');

        $user->setPassword($this->getEncoder()->encodePassword($user, 'test'));

        $user->setEmail('user@gmail.com');

        $user->setRoles(array('ROLE_USER'));

        $manager->persist($user);

        $manager->flush();
    }

}
