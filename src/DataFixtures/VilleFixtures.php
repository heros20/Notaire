<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ville1 = (new Ville())
            ->setTitle('Seoul')
            ->setCodePostal('27568')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');
        
        $ville2 = (new Ville())
            ->setTitle('Busan')
            ->setCodePostal('27753')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $ville3 = (new Ville())
            ->setTitle('Incheon')
            ->setCodePostal('27375')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $manager->persist($ville1);
        $manager->persist($ville2);
        $manager->persist($ville3);

        $manager->flush();
    }
}
