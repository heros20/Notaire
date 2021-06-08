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
        for ($i=0; $i < 10; $i++) { 
            $annonce1 = new Annonce();
            $annonce1 ->setTitle('Villa vue sur mer');
            $annonce1 ->setDescription('jolie trop mognon');
            $annonce1 ->setPrice(120000);
            $annonce1 ->setSuperficie(1000);
            $annonce1 ->setSuperficieTerrain(1500);
            $annonce1 ->setDpe(220);
            $annonce1 ->setGes(220);
            $annonce1 ->setNbrePieces(4);
            $annonce1 ->setNbreChambre(2);
            $annonce1 ->setSalleBain(1);
            $annonce1 ->setWc(1);
            $annonce1 ->setGarage(1);
            $annonce1 ->setPiscine(1);
            $annonce1 ->setStatus(true);
            $annonce1 ->setVille($this->getReference('ville1'));
            $annonce1 ->setDepartement($this->getReference('departement2'));
            $annonce1 ->addCategory($this->getReference('category3'));
            $manager->persist($annonce1);
        }
        for ($i=0; $i < 10; $i++) { 
            $annonce2 = new Annonce();
            $annonce2 ->setTitle('knrfsvrs');
            $annonce2 ->setDescription('livlsfhrvr fvjiovjrfs dsxilvsfjvsdosoivs');
            $annonce2 ->setPrice(20000);
            $annonce2 ->setSuperficie(1000);
            $annonce2 ->setSuperficieTerrain(1500);
            $annonce2 ->setDpe(220);
            $annonce2 ->setGes(220);
            $annonce2 ->setNbrePieces(4);
            $annonce2 ->setNbreChambre(2);
            $annonce2 ->setSalleBain(1);
            $annonce2 ->setWc(1);
            $annonce2 ->setGarage(1);
            $annonce2 ->setPiscine(1);
            $annonce2 ->setStatus(false);
            $annonce2 ->setVille($this->getReference('ville1'));
            $annonce2 ->setDepartement($this->getReference('departement1'));
            $annonce2 ->addCategory($this->getReference('category2'));
            $manager->persist($annonce2);
        }
        for ($i=0; $i < 10; $i++) { 
            $annonce3 = new Annonce();
            $annonce3 ->setTitle('fjfzrisf ffikfg');
            $annonce3 ->setDescription('jhforif zhfifes fhesd qfrfzr');
            $annonce3 ->setPrice(100000);
            $annonce3 ->setSuperficie(1000);
            $annonce3 ->setSuperficieTerrain(1500);
            $annonce3 ->setDpe(220);
            $annonce3 ->setGes(220);
            $annonce3 ->setNbrePieces(4);
            $annonce3 ->setNbreChambre(2);
            $annonce3 ->setSalleBain(1);
            $annonce3 ->setWc(1);
            $annonce3 ->setGarage(1);
            $annonce3 ->setPiscine(1);
            $annonce3 ->setStatus(true);
            $annonce3 ->setVille($this->getReference('ville2'));
            $annonce3 ->setDepartement($this->getReference('departement3'));
            $annonce3 ->addCategory($this->getReference('category1'));
            $manager->persist($annonce3);
        }
        // $annonce1 = new Annonce();
        // $annonce1 ->setTitle('Villa vue sur mer');
        // $annonce1 ->setDescription('jolie trop mognon');
        // $annonce1 ->setImage('https://picsum.photos/200/300');
        // $annonce1 ->setPrice(120000);
        // $annonce1 ->setStatus(true);
        // $annonce1 ->setVille($this->getReference('ville1'));
        // $annonce1 ->setDepartement($this->getReference('departement2'));
        // $annonce1 ->addCategory($this->getReference('category3'));
        // $manager->persist($annonce1);

        // $annonce2 = new Annonce();
        // $annonce2 ->setTitle('knrfsvrs');
        // $annonce2 ->setImage('https://picsum.photos/200/300');
        // $annonce2 ->setDescription('livlsfhrvr fvjiovjrfs dsxilvsfjvsdosoivs');
        // $annonce2 ->setPrice(20000);
        // $annonce2 ->setStatus(false);
        // $annonce2 ->setVille($this->getReference('ville1'));
        // $annonce2 ->setDepartement($this->getReference('departement1'));
        // $annonce2 ->addCategory($this->getReference('category2'));
        // $manager->persist($annonce2);

        // $annonce3 = new Annonce();
        // $annonce3 ->setTitle('fjfzrisf ffikfg');
        // $annonce3 ->setDescription('jhforif zhfifes fhesd qfrfzr');
        // $annonce3 ->setImage('https://picsum.photos/200/300');
        // $annonce3 ->setPrice(100000);
        // $annonce3 ->setStatus(true);
        // $annonce3 ->setVille($this->getReference('ville2'));
        // $annonce3 ->setDepartement($this->getReference('departement3'));
        // $annonce3 ->addCategory($this->getReference('category4'));
        // $manager->persist($annonce3);

        // $annonce4 = new Annonce();
        // $annonce4 ->setTitle('Villa vue sur mer');
        // $annonce4 ->setDescription('jolie trop mognon');
        // $annonce4 ->setImage('https://picsum.photos/200/300');
        // $annonce4 ->setPrice(120000);
        // $annonce4 ->setStatus(true);
        // $annonce4 ->setVille($this->getReference('ville1'));
        // $annonce4 ->setDepartement($this->getReference('departement2'));
        // $annonce4 ->addCategory($this->getReference('category3'));
        // $manager->persist($annonce4);

        // $annonce5 = new Annonce();
        // $annonce5 ->setTitle('Villa vue sur mer');
        // $annonce5 ->setDescription('jolie trop mognon');
        // $annonce5 ->setImage('https://picsum.photos/200/300');
        // $annonce5 ->setPrice(120000);
        // $annonce5 ->setStatus(true);
        // $annonce5 ->setVille($this->getReference('ville1'));
        // $annonce5 ->setDepartement($this->getReference('departement2'));
        // $annonce5 ->addCategory($this->getReference('category3'));
        // $manager->persist($annonce5);

        // $annonce6 = new Annonce();
        // $annonce6 ->setTitle('Villa vue sur mer');
        // $annonce6 ->setDescription('jolie trop mognon');
        // $annonce6 ->setImage('https://picsum.photos/200/300');
        // $annonce6 ->setPrice(120000);
        // $annonce6 ->setStatus(true);
        // $annonce6 ->setVille($this->getReference('ville1'));
        // $annonce6 ->setDepartement($this->getReference('departement2'));
        // $annonce6 ->addCategory($this->getReference('category3'));
        // $manager->persist($annonce6);

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
