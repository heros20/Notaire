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
            ->setTitle('Deauville')
            ->setCodePostal('14800');
        
        $ville2 = (new Ville())
            ->setTitle('Pont-Audemer')
            ->setCodePostal('27260');

        $ville3 = (new Ville())
            ->setTitle('Paris')
            ->setCodePostal('75')
            ->setDescription('Belle appartement à Paris');

        $ville4 = (new Ville())
        ->setTitle('Honfleur')
        ->setCodePostal('76');

        $ville5 = (new Ville())
        ->setTitle('Caen')
        ->setCodePostal('14')
        ->setDescription('Facilitez de vie au coeur du centre ville');

        $ville6 = (new Ville())
        ->setTitle('Havre')
        ->setCodePostal('76000');

        $manager->persist($ville1);
        $manager->persist($ville2);
        $manager->persist($ville3);
        $manager->persist($ville4);
        $manager->persist($ville5);
        $manager->persist($ville6);

        $manager->flush();

        $this->addReference('ville1', $ville1);
        $this->addReference('ville2', $ville2);
        $this->addReference('ville3', $ville3);
        $this->addReference('ville4', $ville4);
        $this->addReference('ville5', $ville5);
        $this->addReference('ville6', $ville6);
    }
}
