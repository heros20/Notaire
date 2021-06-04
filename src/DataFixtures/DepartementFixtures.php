<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Departement;

class DepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $departement1 = (new Departement())
            ->setTitle('Eure')
            ->setCodePostal('27')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');
        
        $departement2 = (new Departement())
            ->setTitle('Seine-Maritime')
            ->setCodePostal('76')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $departement3 = (new Departement())
            ->setTitle('Calvados')
            ->setCodePostal('14')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $manager->persist($departement1);
        $manager->persist($departement2);
        $manager->persist($departement3);
        

        $manager->flush();

        $this->addReference('departement1', $departement1);
        $this->addReference('departement2', $departement2);
        $this->addReference('departement3', $departement3);
    }
}
