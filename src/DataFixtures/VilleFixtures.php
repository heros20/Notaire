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
            ->setCodePostal('568')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');
        
        $ville2 = (new Ville())
            ->setTitle('Busan')
            ->setCodePostal('753')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $ville3 = (new Ville())
            ->setTitle('Incheon')
            ->setCodePostal('375')
            ->setDescription('jfsdegf dhoir ihsdofi shdgfh');

        $manager->persist($ville1);
        $manager->persist($ville2);
        $manager->persist($ville3);

        $manager->flush();

        $this->addReference('ville1', $ville1);
        $this->addReference('ville2', $ville2);
        $this->addReference('ville3', $ville3);
    }
}
