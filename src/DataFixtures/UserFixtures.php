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

        $admin2 = new User();
        $admin2->setName('Daufresne')
              ->setUsername('Sebastien')
              ->setToken($this->tokengenerator->generateToken())
              ->setCreatedAt(new DateTime())
              ->setEmail('sebastienweb27@gmail.com')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin2,
                '123456'
              ));
        $manager->persist($admin2);

        $admin3 = new User();
        $admin3->setName('Zenon')
              ->setUsername('Stella')
              ->setToken($this->tokengenerator->generateToken())
              ->setCreatedAt(new DateTime())
              ->setEmail('stellazenon@gmail.com')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordHasher->hashPassword(
                $admin3,
                '123456'
              ));
        $manager->persist($admin3);

        // $admin4 = new User();
        // $admin4->setName('Michellus')
        //       ->setUsername('Michel')
        //       ->setToken($this->tokengenerator->generateToken())
        //       ->setCreatedAt(new DateTime())
        //       ->setEmail('quidelantoine@gmail.com')
        //       ->setRoles(array('ROLE_ADMIN'))
        //       ->setPassword($this->passwordHasher->hashPassword(
        //         $admin4,
        //         'michel'
        //       ));
        // $manager->persist($admin4);


        $manager->flush();
    }
}
