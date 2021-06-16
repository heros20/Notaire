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
        $annonce2->addCategory($this->getReference('category1'));
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
        $annonce4->setImage('appartement2.jpg');
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
        $annonce4->addCategory($this->getReference('category2'));
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
        $annonce5->addCategory($this->getReference('category2'));
        $manager->persist($annonce5);


        $annonce6 = new Annonce();
        $annonce6->setTitle('Maison');
        $annonce6->setDescription('Découvrez cette magnifique maison Normande');
        $annonce6->setImage('maison2.jpg');
        $annonce6->setPrice(10000);
        $annonce6->setSuperficie(10000);
        $annonce6->setSuperficieTerrain(1500);
        $annonce6->setDpe('d');
        $annonce6->setGes('d');
        $annonce6->setNbrePieces(4);
        $annonce6->setNbreChambre(3);
        $annonce6->setSalleBain(2);
        $annonce6->setWc(2);
        $annonce6->setGarage('oui');
        $annonce6->setPiscine('oui');
        $annonce6->setStatus(true);
        $annonce6->setVille($this->getReference('ville6'));
        $annonce6->setDepartement($this->getReference('departement6'));
        $annonce6->addCategory($this->getReference('category2'));
        $manager->persist($annonce6);

        $annonce7 = new Annonce();
        $annonce7->setTitle('terrain constructible');
        $annonce7->setDescription('Terrain pour lot de maison');
        $annonce7->setImage('terrain.jpg');
        $annonce7->setPrice(1000000);
        $annonce7->setSuperficie(10000);
        $annonce7->setSuperficieTerrain(1500);
        $annonce7->setDpe('a');
        $annonce7->setGes('d');
        $annonce7->setStatus(true);
        $annonce7->setVille($this->getReference('ville5'));
        $annonce7->setDepartement($this->getReference('departement7'));
        $annonce7->addCategory($this->getReference('category4'));
        $manager->persist($annonce7);

        $annonce8 = new Annonce();
        $annonce8->setTitle('Terrain non constructible');
        $annonce8->setDescription('Terrain non constructible');
        $annonce8->setImage('terrain2.jpg');
        $annonce8->setPrice(100000);
        $annonce8->setSuperficie(900);
        $annonce8->setDpe('a');
        $annonce8->setGes('a');
        $annonce8->setStatus(true);
        $annonce8->setVille($this->getReference('ville5'));
        $annonce8->setDepartement($this->getReference('departement3'));
        $annonce8->addCategory($this->getReference('category5'));
        $manager->persist($annonce8);

        $annonce9 = new Annonce();
        $annonce9->setTitle('Résidence');
        $annonce9->setDescription('Résidence');
        $annonce9->setImage('appartement.jpg');
        $annonce9->setPrice(10000);
        $annonce9->setSuperficie(150);
        $annonce9->setDpe('d');
        $annonce9->setGes('a');
        $annonce9->setNbrePieces(8);
        $annonce9->setNbreChambre(9);
        $annonce9->setSalleBain(6);
        $annonce9->setWc(8);
        $annonce9->setGarage('non');
        $annonce9->setPiscine('oui');
        $annonce9->setStatus(true);
        $annonce9->setVille($this->getReference('ville6'));
        $annonce9->setDepartement($this->getReference('departement4'));
        $annonce9->addCategory($this->getReference('category3'));
        $manager->persist($annonce9);
        $manager->flush();

        $annonce10 = new Annonce();
        $annonce10->setTitle('Maison');
        $annonce10->setDescription('Maison avec vue sur le musée');
        $annonce10->setImage('maison.jpg');
        $annonce10->setPrice(10000);
        $annonce10->setSuperficie(180);
        $annonce10->setSuperficieTerrain('50');
        $annonce10->setDpe('a');
        $annonce10->setGes('d');
        $annonce10->setNbrePieces(4);
        $annonce10->setNbreChambre(4);
        $annonce10->setSalleBain(2);
        $annonce10->setWc(1);
        $annonce10->setGarage('oui');
        $annonce10->setPiscine('oui');
        $annonce10->setStatus(true);
        $annonce10->setVille($this->getReference('ville4'));
        $annonce10->setDepartement($this->getReference('departement5'));
        $annonce10->addCategory($this->getReference('category2'));
        $manager->persist($annonce10);

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
