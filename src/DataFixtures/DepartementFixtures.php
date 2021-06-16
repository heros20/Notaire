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
            ->setTitle('Deauville')
            ->setCodePostal('14')
            ->setDescription('Venez visitez ce magnifique département');
        
        $departement2 = (new Departement())
            ->setTitle('Charente-Maritime')
            ->setCodePostal('173')
            ->setDescription('');

        $departement3 = (new Departement())
            ->setTitle('Paris')
            ->setCodePostal('75')
            ->setDescription('Situé en plein coeur des champs élysée');

        $departement4 = (new Departement())
        ->setTitle('Honfleur')
        ->setCodePostal('76')
        ->setDescription('Situé en plein centre ville');

        $departement5 = (new Departement())
        ->setTitle('Caen')
        ->setCodePostal('14')
        ->setDescription('Situé en plein centre ville');

        $departement6 = (new Departement())
        ->setTitle('Havre')
        ->setCodePostal('76000');

        $departement7 = (new Departement())
        ->setTitle('Epaignes')
        ->setCodePostal('27260');

        $departement8 = (new Departement())
        ->setTitle('Cormeilles')
        ->setCodePostal('27260');

        $manager->persist($departement1);
        $manager->persist($departement2);
        $manager->persist($departement3);
        $manager->persist($departement4);
        $manager->persist($departement5);
        $manager->persist($departement6);
        $manager->persist($departement7);
        $manager->persist($departement8);
        

        $manager->flush();

        $this->addReference('departement1', $departement1);
        $this->addReference('departement2', $departement2);
        $this->addReference('departement3', $departement3);
        $this->addReference('departement4', $departement4);
        $this->addReference('departement5', $departement5);
        $this->addReference('departement6', $departement6);
        $this->addReference('departement7', $departement7);
        $this->addReference('departement8', $departement8);
    }
}
