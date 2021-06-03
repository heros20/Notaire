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

        $admin2 = new User();
        $admin2->setName('admin')
              ->setUsername('admin')
              ->setToken('zzzzzz')
              ->setCreatedAt(new DateTime())
              ->setEmail('sebatienweb27@gmail.com')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin2,
                '123456'
              ));
        $manager->persist($admin2);

        $admin3 = new User();
        $admin3->setName('admin')
              ->setUsername('admin')
              ->setToken('aaaaa')
              ->setCreatedAt(new DateTime())
              ->setEmail('stellazenon@gmail.com')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin3,
                '123456'
              ));
        $manager->persist($admin3);

        $manager->flush();
    }
}
