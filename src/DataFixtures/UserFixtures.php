<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\entity\User;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    private $tokengenerator;
    public function __construct(UserPasswordHasherInterface $passwordHasher, TokenGeneratorInterface $tokengenerator)
    {
        $this->passwordHasher = $passwordHasher;
        $this->tokengenerator = $tokengenerator;
    }
    

    public function load(ObjectManager $manager)
    {
        
        $admin = new User();
        $admin->setName('Quillet')
              ->setUsername('Kevin')
              ->setToken($this->tokengenerator->generateToken())
              ->setCreatedAt(new DateTime())
              ->setEmail('heros40@hotmail.fr')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin,
                '123456'
              ));
        $manager->persist($admin);

        $user1 = new User();
        $user1->setName('maxime')
              ->setUsername('Ladelete')
              ->setToken($this->tokengenerator->generateToken())
              ->setCreatedAt(new DateTime())
              ->setEmail('ma-ladelete@gmail.com')
              ->setRoles(array('ROLE_USER'))
              ->setPassword($this->passwordHasher->hashPassword(
                $user1,
                '123456'
              ));
        $manager->persist($user1);




        $manager->flush();
    }
}
