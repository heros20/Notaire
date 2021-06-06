<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use App\DataFixtures\VilleFixtures;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\DepartementFixtures;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $annonce1 = new Annonce();
        $annonce1 ->setTitle('Villa vue sur mer');
        $annonce1 ->setDescription('jolie trop mognon');
        $annonce1 ->setImage('https://picsum.photos/200/300');
        $annonce1 ->setPrice(120000);
        $annonce1 ->setStatus(true);
        $annonce1 ->setVille($this->getReference('ville1'));
        $annonce1 ->setDepartement($this->getReference('departement2'));
        $annonce1 ->addCategory($this->getReference('category3'));
        $manager->persist($annonce1);

        $annonce2 = new Annonce();
        $annonce2 ->setTitle('knrfsvrs');
        $annonce2 ->setImage('https://picsum.photos/200/300');
        $annonce2 ->setDescription('livlsfhrvr fvjiovjrfs dsxilvsfjvsdosoivs');
        $annonce2 ->setPrice(20000);
        $annonce2 ->setStatus(false);
        $annonce2 ->setVille($this->getReference('ville1'));
        $annonce2 ->setDepartement($this->getReference('departement1'));
        $annonce2 ->addCategory($this->getReference('category2'));
        $manager->persist($annonce2);

        $annonce3 = new Annonce();
        $annonce3 ->setTitle('fjfzrisf ffikfg');
        $annonce3 ->setDescription('jhforif zhfifes fhesd qfrfzr');
        $annonce3 ->setImage('https://picsum.photos/200/300');
        $annonce3 ->setPrice(100000);
        $annonce3 ->setStatus(true);
        $annonce3 ->setVille($this->getReference('ville2'));
        $annonce3 ->setDepartement($this->getReference('departement3'));
        $annonce3 ->addCategory($this->getReference('category4'));
        $manager->persist($annonce3);

        $manager->flush();

    }
    public function getDependencies()
    {
        return [
            DepartementFixtures::class,
            CategoryFixtures::class,
            VilleFixtures::class,
        ];
    }
    
}
