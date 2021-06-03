<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\entity\User;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

      public function __construct(UserPasswordEncoderInterface $passwordEncoder)
      {
          $this->passwordEncoder = $passwordEncoder;
      }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('heros40@hotmail.fr')
              ->setRoles(array('ROLE_ADMIN'))
              ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                '123456'
              ));
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('hero20@hotmail.fr')
              ->setRoles(array('ROLE_USER'))
              ->setPassword($this->passwordEncoder->encodePassword(
                $user,
                '123456'
              ));
        $manager->persist($user);




        $manager->flush();
    }
}
