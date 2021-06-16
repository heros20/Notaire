<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $ville1 = (new Ville())
        //     ->setTitle('Deauville')
        //     ->setCodePostal('14800')
        //     ->setDescription('Venez sentir l\'air marin');
        
        // $ville2 = (new Ville())
        //     ->setTitle('Busan')
        //     ->setCodePostal('753')
        //     ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        // $ville3 = (new Ville())
        //     ->setTitle('Paris')
        //     ->setCodePostal('75')
        //     ->setDescription('Belle appartement à Paris');

        // $ville4 = (new Ville())
        // ->setTitle('Honfleur')
        // ->setCodePostal('76')
        // ->setDescription('Vue magnifique sur le vieux port de Honfleur');

        // $ville5 = (new Ville())
        // ->setTitle('Caen')
        // ->setCodePostal('14')
        // ->setDescription('Facilitez de vie au coeur du centre ville');

        // $manager->persist($ville1);
        // $manager->persist($ville2);
        // $manager->persist($ville3);
        // $manager->persist($ville4);
        // $manager->persist($ville5);

        // $manager->flush();

        // $this->addReference('ville1', $ville1);
        // $this->addReference('ville2', $ville2);
        // $this->addReference('ville3', $ville3);
        // $this->addReference('ville4', $ville4);
        // $this->addReference('ville5', $ville5);
    }
}
