<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\entity\Region;
use Faker;

class RegionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) { 
                 $region = (new Region())
                ->setTitle($faker->city);

                $manager->persist($region);
        }

        $manager->flush();

        $this->addReference('region', $region);
    }
}
