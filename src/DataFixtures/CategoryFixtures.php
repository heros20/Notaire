<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = (new Category())
            ->setTitle('Villa');

        $manager->persist($category1);

        $category2 = (new Category())
            ->setTitle('Maison');

        $manager->persist($category2);

        $category3 = (new Category())
            ->setTitle('Appartement')
            ->setDescription('Découvrez ce magnifique appart du 16 ème');

        $manager->persist($category3);

        $category4 = (new Category())
            ->setTitle('Terrain constructible');

        $manager->persist($category4);

        $category5 = (new Category())
            ->setTitle('Terrain non constructible');

        $manager->persist($category5);
     
        $manager->flush();

        
        $this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);
        $this->addReference('category4', $category4);     
        $this->addReference('category5', $category5);         
    }
}
