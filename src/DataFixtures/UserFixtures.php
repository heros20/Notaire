<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setName('admin')
              ->setUsername('admin')
              ->setToken('ddddd')
              ->setCreatedAt(new DateTime())
              ->setEmail('heros40@hotmail.fr')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin,
                '123456'
              ));
        $manager->persist($admin);

        $manager->flush();
    }
}
