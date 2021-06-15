<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        
       for ($i = 0; $i < 15; $i++) { 
            $annonce = (new Annonce())
                    ->setTitle($faker->name)
                    ->setDescription($faker->address)
                    ->setActif(true)
                    ->setRegion($this->getReference('region'));

            $manager->persist($annonce);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RegionFixtures::class,
        ];
    }
}
