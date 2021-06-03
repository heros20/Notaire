<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $annonce1 = (new Annonce())
                    ->setTitle('Villa vue sur mer')
                    ->setDescription('jolie trop mognon')
                    ->setImage('https://picsum.photos/200/300')
                    ->setPrice(120000);
        $manager->persist($annonce1);

        $annonce2 = (new Annonce())
                    ->setTitle('knrfsvrs')
                    ->setDescription('livlsfhrvr fvjiovjrfs dsxilvsfjvsdosoivs')
                    ->setImage('https://picsum.photos/200/300')
                    ->setPrice(20000);
        $manager->persist($annonce2);

        $annonce3 = (new Annonce())
                    ->setTitle('fjfzrisf ffikfg')
                    ->setDescription('jhforif zhfifes fhesd qfrfzr')
                    ->setImage('https://picsum.photos/200/300s')
                    ->setPrice(100000);
        $manager->persist($annonce3);

        $manager->flush();
    }
}
