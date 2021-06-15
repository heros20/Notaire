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
        $annonce1->setTitle('Villa');
        $annonce1->setDescription('Découvrez cette magnifique villa au bord de mer');
        $annonce1->setImage('villa.jpg');
        $annonce1->setPrice(10000000);
        $annonce1->setSuperficie(10000);
        $annonce1->setSuperficieTerrain(1500);
        $annonce1->setDpe('a');
        $annonce1->setGes('d');
        $annonce1->setNbrePieces(10);
        $annonce1->setNbreChambre(20);
        $annonce1->setSalleBain(4);
        $annonce1->setWc(4);
        $annonce1->setGarage('oui');
        $annonce1->setPiscine('oui');
        $annonce1->setStatus(true);
        $annonce1->setVille($this->getReference('ville1'));
        $annonce1->setDepartement($this->getReference('departement1'));
        $annonce1->addCategory($this->getReference('category1'));
        $manager->persist($annonce1);

        $annonce2 = new Annonce();
        $annonce2->setTitle('Villa');
        $annonce2->setDescription('Découvrez cette magnifique villa');
        $annonce2->setImage('villa2.jpg');
        $annonce2->setPrice(10000000);
        $annonce2->setSuperficie(10000);
        $annonce2->setSuperficieTerrain(1500);
        $annonce2->setDpe('a');
        $annonce2->setGes('d');
        $annonce2->setNbrePieces(10);
        $annonce2->setNbreChambre(20);
        $annonce2->setSalleBain(4);
        $annonce2->setWc(4);
        $annonce2->setGarage('oui');
        $annonce2->setPiscine('oui');
        $annonce2->setStatus(true);
        $annonce2->setVille($this->getReference('ville2'));
        $annonce2->setDepartement($this->getReference('departement2'));
        $annonce2->addCategory($this->getReference('category2'));
        $manager->persist($annonce2);
 
        $annonce3 = new Annonce();
        $annonce3->setTitle('Appartement');
        $annonce3->setDescription('Appartement du 16 ème');
        $annonce3->setImage('appartement.jpg');
        $annonce3->setPrice(10000);
        $annonce3->setSuperficie(100);
        $annonce3->setDpe('a');
        $annonce3->setGes('a');
        $annonce3->setNbrePieces(1);
        $annonce3->setNbreChambre(2);
        $annonce3->setSalleBain(1);
        $annonce3->setWc(1);
        $annonce3->setGarage('non');
        $annonce3->setPiscine('non');
        $annonce3->setStatus(true);
        $annonce3->setVille($this->getReference('ville3'));
        $annonce3->setDepartement($this->getReference('departement3'));
        $annonce3->addCategory($this->getReference('category3'));
        $manager->persist($annonce3);

        $annonce4 = new Annonce();
        $annonce4->setTitle('Résidence');
        $annonce4->setDescription('Résidence');
        $annonce4->setImage('appartement.jpg');
        $annonce4->setPrice(100000);
        $annonce4->setSuperficie(800);
        $annonce4->setDpe('b');
        $annonce4->setGes('c');
        $annonce4->setNbrePieces(8);
        $annonce4->setNbreChambre(9);
        $annonce4->setSalleBain(6);
        $annonce4->setWc(8);
        $annonce4->setGarage('non');
        $annonce4->setPiscine('oui');
        $annonce4->setStatus(true);
        $annonce4->setVille($this->getReference('ville4'));
        $annonce4->setDepartement($this->getReference('departement4'));
        $annonce4->addCategory($this->getReference('category4'));
        $manager->persist($annonce4);
        $manager->flush();

        $annonce5 = new Annonce();
        $annonce5->setTitle('Maison');
        $annonce5->setDescription('Maison avec vue sur le musée');
        $annonce5->setImage('maison.jpg');
        $annonce5->setPrice(10000);
        $annonce5->setSuperficie(180);
        $annonce5->setSuperficieTerrain('500');
        $annonce5->setDpe('c');
        $annonce5->setGes('a');
        $annonce5->setNbrePieces(4);
        $annonce5->setNbreChambre(4);
        $annonce5->setSalleBain(2);
        $annonce5->setWc(1);
        $annonce5->setGarage('oui');
        $annonce5->setPiscine('non');
        $annonce5->setStatus(true);
        $annonce5->setVille($this->getReference('ville5'));
        $annonce5->setDepartement($this->getReference('departement5'));
        $annonce5->addCategory($this->getReference('category5'));
        $manager->persist($annonce5);
        $manager->flush();

        for ($i=0; $i < 15; $i++) { 
        $annonce6 = new Annonce();
        $annonce6->setTitle('Maison');
        $annonce6->setDescription('Maison avec vue sur le musée');
        $annonce6->setImage('maison.jpg');
        $annonce6->setPrice(10000);
        $annonce6->setSuperficie(180);
        $annonce6->setSuperficieTerrain('600');
        $annonce6->setDpe('c');
        $annonce6->setGes('a');
        $annonce6->setNbrePieces(4);
        $annonce6->setNbreChambre(4);
        $annonce6->setSalleBain(2);
        $annonce6->setWc(1);
        $annonce6->setGarage('oui');
        $annonce6->setPiscine('non');
        $annonce6->setStatus(false);
        $annonce6->setVille($this->getReference('ville5'));
        $annonce6->setDepartement($this->getReference('departement5'));
        $annonce6->addCategory($this->getReference('category5'));
        $manager->persist($annonce6);
        $manager->flush();
        }
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
