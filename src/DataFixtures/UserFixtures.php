<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->passwordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Fogo');
        $user->setEmail('fogo@gmail.com');
        $user->setRoles('ROLE_USER');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'secretpw1'));
        $manager->persist($user);

        $user = new User();
        $user->setName('Vojthas');
        $user->setEmail('vojthas@gmail.com');
        $user->setRoles('ROLE_USER');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'secretpw2'));
        $manager->persist($user);

        $user = new User();
        $user->setName('MoMarcin');
        $user->setEmail('momarcin@gmail.com');
        $user->setRoles('ROLE_USER');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'secretpw3'));
        $manager->persist($user);

        $manager->flush();
    }
}
