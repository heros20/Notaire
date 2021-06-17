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
            ->setTitle('Calvados')
            ->setCodePostal('14')
            ->setDescription('Venez visitez ce magnifique département');
        
        $departement2 = (new Departement())
            ->setTitle('Eure')
            ->setCodePostal('27');

        $departement3 = (new Departement())
            ->setTitle('Manche ')
            ->setCodePostal('50')
            ->setDescription('Situé en plein coeur des champs élysée');

        $departement4 = (new Departement())
        ->setTitle('Orne ')
        ->setCodePostal('61')
        ->setDescription('Situé en plein centre ville');

        $departement5 = (new Departement())
        ->setTitle('Seine-Maritime')
        ->setCodePostal('76')
        ->setDescription('Situé en plein centre ville');

        $manager->persist($departement1);
        $manager->persist($departement2);
        $manager->persist($departement3);
        $manager->persist($departement4);
        $manager->persist($departement5);
        

        $manager->flush();

        $this->addReference('departement1', $departement1);
        $this->addReference('departement2', $departement2);
        $this->addReference('departement3', $departement3);
        $this->addReference('departement4', $departement4);
        $this->addReference('departement5', $departement5);
    }
}
