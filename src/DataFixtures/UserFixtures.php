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

    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setUsername('webmaster');

        $password = $this->encoder->encodePassword($user, 'test');
        $user->setPassword($password);

        $user->setEmail('webmaster@gmail.com');

        $user->setRoles(array('ROLE_ADMIN'));

        $manager->persist($user);
        $manager->flush();
    }

}
