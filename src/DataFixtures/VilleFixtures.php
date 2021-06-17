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
            ->setCodePostal('75000');

        $ville4 = (new Ville())
        ->setTitle('Honfleur')
        ->setCodePostal('14600');

        $ville5 = (new Ville())
        ->setTitle('Caen')
        ->setCodePostal('14000');

        $ville6 = (new Ville())
        ->setTitle('Havre')
        ->setCodePostal('76000');

        $ville7 = (new Ville())
        ->setTitle('Grainville-sur-Odon')
        ->setCodePostal('14210');

        $ville8 = (new Ville())
        ->setTitle('Amayé-sur-Orne')
        ->setCodePostal('14006');

        $ville9 = (new Ville())
        ->setTitle('Varaville')
        ->setCodePostal('14390');

        $manager->persist($ville1);
        $manager->persist($ville2);
        $manager->persist($ville3);
        $manager->persist($ville4);
        $manager->persist($ville5);
        $manager->persist($ville6);
        $manager->persist($ville7);
        $manager->persist($ville8);
        $manager->persist($ville9);

        $manager->flush();

        $this->addReference('ville1', $ville1);
        $this->addReference('ville2', $ville2);
        $this->addReference('ville3', $ville3);
        $this->addReference('ville4', $ville4);
        $this->addReference('ville5', $ville5);
        $this->addReference('ville6', $ville6);
        $this->addReference('ville7', $ville7);
        $this->addReference('ville8', $ville8);
        $this->addReference('ville9', $ville9);
    }
}
