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
        $annonce1->setTitle('Vente : Nouvelle villa de nature');
        $annonce1->setDescription('Changez pour cette maison accompagnée de 3 chambres et d\'une grande terrasse de 40m2 sur le territoire de Villegailhenc dans un quartier non innondable. Construction de 1985.');
        $annonce1->setImage('villa.jpg');
        $annonce1->setPrice(1000000);
        $annonce1->setSuperficie(300);
        $annonce1->setSuperficieTerrain(4000);
        $annonce1->setDpe('A');
        $annonce1->setGes('B');
        $annonce1->setNbrePieces(12);
        $annonce1->setNbreChambre(5);
        $annonce1->setSalleBain(3);
        $annonce1->setWc(2);
        $annonce1->setGarage('oui');
        $annonce1->setPiscine('oui');
        $annonce1->setStatus(1);
        $annonce1->setVille($this->getReference('ville1'));
        $annonce1->setDepartement($this->getReference('departement1'));
        $annonce1->addCategory($this->getReference('category1'));
        $manager->persist($annonce1);

        $annonce1b = new Annonce();
        $annonce1b->setTitle('Vente : Villa sans vis-à-vis');
        $annonce1b->setDescription('cette magnifique villa de 183 m² sur un terrain clos de 637 m²');
        $annonce1b->setImage('villa.jpg');
        $annonce1b->setPrice(784000);
        $annonce1b->setSuperficie(183);
        $annonce1b->setSuperficieTerrain(637);
        $annonce1b->setDpe('A');
        $annonce1b->setGes('B');
        $annonce1b->setNbrePieces(12);
        $annonce1b->setNbreChambre(5);
        $annonce1b->setSalleBain(3);
        $annonce1b->setWc(2);
        $annonce1b->setGarage('oui');
        $annonce1b->setPiscine('oui');
        $annonce1b->setStatus(1);
        $annonce1b->setVille($this->getReference('ville2'));
        $annonce1b->setDepartement($this->getReference('departement2'));
        $annonce1b->addCategory($this->getReference('category1'));
        $manager->persist($annonce1b);

        $annonce2 = new Annonce();
        $annonce2->setTitle('Vente : Maison de campagne');
        $annonce2->setDescription('Maison indépendante d\'environ 82m2 Hab (possibilité agrandissement) au calme, à la campagne, sans vis à vis');
        $annonce2->setImage('villa2.jpg');
        $annonce2->setPrice(324000);
        $annonce2->setSuperficie(82);
        $annonce2->setSuperficieTerrain(1000);
        $annonce2->setDpe('A');
        $annonce2->setGes('D');
        $annonce2->setNbrePieces(4);
        $annonce2->setNbreChambre(2);
        $annonce2->setSalleBain(1);
        $annonce2->setWc(1);
        $annonce2->setGarage('non');
        $annonce2->setPiscine('non');
        $annonce2->setStatus(1);
        $annonce2->setVille($this->getReference('ville3'));
        $annonce2->setDepartement($this->getReference('departement3'));
        $annonce2->addCategory($this->getReference('category2'));
        $manager->persist($annonce2);

        $annonce2b = new Annonce();
        $annonce2b->setTitle('Vente : Maison p4 de 105 m² habitables');
        $annonce2b->setDescription('Maison indépendante d\'environ 82m2 Hab (possibilité agrandissement) au calme, à la campagne, sans vis à vis');
        $annonce2b->setImage('villa2.jpg');
        $annonce2b->setPrice(440000);
        $annonce2b->setSuperficie(105);
        $annonce2b->setSuperficieTerrain(1000);
        $annonce2b->setDpe('A');
        $annonce2b->setGes('D');
        $annonce2b->setNbrePieces(4);
        $annonce2b->setNbreChambre(2);
        $annonce2b->setSalleBain(1);
        $annonce2b->setWc(1);
        $annonce2b->setGarage('non');
        $annonce2b->setPiscine('non');
        $annonce2b->setStatus(1);
        $annonce2b->setVille($this->getReference('ville4'));
        $annonce2b->setDepartement($this->getReference('departement4'));
        $annonce2b->addCategory($this->getReference('category2'));
        $manager->persist($annonce2b);

        $annonce2c = new Annonce();
        $annonce2c->setTitle('Vente : Maison en colombage');
        $annonce2c->setDescription('Venez découvrir cette magnifique maison en colombage ');
        $annonce2c->setImage('villa2.jpg');
        $annonce2c->setPrice(524000);
        $annonce2c->setSuperficie(120);
        $annonce2c->setSuperficieTerrain(2500);
        $annonce2c->setDpe('A');
        $annonce2c->setGes('D');
        $annonce2c->setNbrePieces(4);
        $annonce2c->setNbreChambre(2);
        $annonce2c->setSalleBain(1);
        $annonce2c->setWc(1);
        $annonce2c->setGarage('non');
        $annonce2c->setPiscine('non');
        $annonce2c->setStatus(1);
        $annonce2c->setVille($this->getReference('ville5'));
        $annonce2c->setDepartement($this->getReference('departement5'));
        $annonce2c->addCategory($this->getReference('category2'));
        $manager->persist($annonce2c);
 
        $annonce3 = new Annonce();
        $annonce3->setTitle('Vente : Appartement limitrophe');
        $annonce3->setDescription('dans résidence récente, sécurisée, calme, année 2013. Appartement de 62m2 comprenant, cuisine ouverte sur salle salon');
        $annonce3->setImage('appartement.jpg');
        $annonce3->setPrice(201000);
        $annonce3->setSuperficie(62);
        $annonce3->setDpe('A');
        $annonce3->setGes('A');
        $annonce3->setNbrePieces(3);
        $annonce3->setNbreChambre(1);
        $annonce3->setSalleBain(1);
        $annonce3->setWc(1);
        $annonce3->setGarage('non');
        $annonce3->setPiscine('non');
        $annonce3->setStatus(1);
        $annonce3->setVille($this->getReference('ville6'));
        $annonce3->setDepartement($this->getReference('departement1'));
        $annonce3->addCategory($this->getReference('category3'));
        $manager->persist($annonce3);

         $annonce4 = new Annonce();
        $annonce4->setTitle('Vente : Appartement bord de mer');
        $annonce4->setDescription('Proche de la mer, sécurisée, calme. Appartement de 45m2 comprenant, cuisine ouverte sur salle salon');
        $annonce4->setImage('appartement.jpg');
        $annonce4->setPrice(241000);
        $annonce4->setSuperficie(45);
        $annonce4->setDpe('A');
        $annonce4->setGes('C');
        $annonce4->setNbrePieces(2);
        $annonce4->setNbreChambre(1);
        $annonce4->setSalleBain(1);
        $annonce4->setWc(1);
        $annonce4->setGarage('non');
        $annonce4->setPiscine('non');
        $annonce4->setStatus(1);
        $annonce4->setVille($this->getReference('ville7'));
        $annonce4->setDepartement($this->getReference('departement2'));
        $annonce4->addCategory($this->getReference('category3'));
        $manager->persist($annonce4);

         $annonce5 = new Annonce();
        $annonce5->setTitle('Vente : Appartement en residence calme');
        $annonce5->setDescription('dans résidence calme année 2020. Appartement de 62m2 comprenant, sorti de terre recente.');
        $annonce5->setImage('appartement.jpg');
        $annonce5->setPrice(178020);
        $annonce5->setSuperficie(71);
        $annonce5->setDpe('C');
        $annonce5->setGes('D');
        $annonce5->setNbrePieces(3);
        $annonce5->setNbreChambre(1);
        $annonce5->setSalleBain(1);
        $annonce5->setWc(1);
        $annonce5->setGarage('non');
        $annonce5->setPiscine('non');
        $annonce5->setStatus(1);
        $annonce5->setVille($this->getReference('ville8'));
        $annonce5->setDepartement($this->getReference('departement3'));
        $annonce5->addCategory($this->getReference('category3'));
        $manager->persist($annonce5);

        $annonce4z = new Annonce();
        $annonce4z->setTitle('Vente : Immeuble de rapport composé de 2 appartements en duplex');
        $annonce4z->setDescription('Bon rendement locatif, tous les appartements sont occupés.');
        $annonce4z->setImage('appartement2.jpg');
        $annonce4z->setPrice(875000);
        $annonce4z->setSuperficie(500);
        $annonce4z->setDpe('F');
        $annonce4z->setGes('G');
        $annonce4z->setNbrePieces(8);
        $annonce4z->setNbreChambre(4);
        $annonce4z->setSalleBain(2);
        $annonce4z->setWc(2);
        $annonce4z->setGarage('non');
        $annonce4z->setPiscine('non');
        $annonce4z->setStatus(1);
        $annonce4z->setVille($this->getReference('ville9'));
        $annonce4z->setDepartement($this->getReference('departement4'));
        $annonce4z->addCategory($this->getReference('category4'));
        $manager->persist($annonce4z);
        $manager->flush();

        $annonce4e = new Annonce();
        $annonce4e->setTitle('Vente : Immeuble dans un quartier pavillonnaire');
        $annonce4e->setDescription('immeuble sur un terrain d\'environ 340m² composé de 2 boutiques');
        $annonce4e->setImage('appartement2.jpg');
        $annonce4e->setPrice(100000);
        $annonce4e->setSuperficie(800);
        $annonce4e->setDpe('C');
        $annonce4e->setGes('C');
        $annonce4e->setNbrePieces(5);
        $annonce4e->setWc(2);
        $annonce4e->setGarage('non');
        $annonce4e->setPiscine('non');
        $annonce4e->setStatus(1);
        $annonce4e->setVille($this->getReference('ville9'));
        $annonce4e->setDepartement($this->getReference('departement4'));
        $annonce4e->addCategory($this->getReference('category4'));
        $manager->persist($annonce4e);
        $manager->flush();

        $annonce5a = new Annonce();
        $annonce5a->setTitle('Vente : Terrain non constructible idéal chevaux');
        $annonce5a->setDescription('Au centre d\'un village situé à 10 mns de la Ferté-Gaucher et 30 de Coulommiers');
        $annonce5a->setImage('maison.jpg');
        $annonce5a->setPrice(10000);
        $annonce5a->setSuperficie(180);
        $annonce5a->setSuperficieTerrain('500');
        $annonce5a->setDpe('A');
        $annonce5a->setGes('A');
        $annonce5a->setStatus(1);
        $annonce5a->setVille($this->getReference('ville5'));
        $annonce5a->setDepartement($this->getReference('departement2'));
        $annonce5a->addCategory($this->getReference('category5'));
        $manager->persist($annonce5a);

        $annonce5b = new Annonce();
        $annonce5b->setTitle('Vente : Terrain non constructible pour toute activité plein air');
        $annonce5b->setDescription('Magnifique terrain de 2430 m2, viabilités en bordure, proche village à préaux à 1h de valence');
        $annonce5b->setImage('maison.jpg');
        $annonce5b->setPrice(50000);
        $annonce5b->setSuperficie(2430);
        $annonce5b->setDpe('A');
        $annonce5b->setGes('A');
        $annonce5b->setStatus(1);
        $annonce5b->setVille($this->getReference('ville4'));
        $annonce5b->setDepartement($this->getReference('departement1'));
        $annonce5b->addCategory($this->getReference('category5'));
        $manager->persist($annonce5b);


        $annonce6 = new Annonce();
        $annonce6->setTitle('Vente :  Terrain 380 m²');
        $annonce6->setDescription('magnifique terrain plat , constructible , de 380m2 , situé en plein centre de la commune');
        $annonce6->setImage('maison2.jpg');
        $annonce6->setPrice(75230);
        $annonce6->setSuperficie(380);
        $annonce6->setDpe('A');
        $annonce6->setGes('A');
        $annonce6->setStatus(1);
        $annonce6->setVille($this->getReference('ville6'));
        $annonce6->setDepartement($this->getReference('departement3'));
        $annonce6->addCategory($this->getReference('category6'));
        $manager->persist($annonce6);

        $annonce6A = new Annonce();
        $annonce6A->setTitle('Vente :  Beau Terrain 265 m²');
        $annonce6A->setDescription('Terrain à bâtir. Proche Zone commerciale, Situé en retrait du village dans un coin paisible');
        $annonce6A->setImage('maison2.jpg');
        $annonce6A->setPrice(65000);
        $annonce6A->setSuperficie(380);
        $annonce6A->setDpe('A');
        $annonce6A->setGes('A');
        $annonce6A->setStatus(1);
        $annonce6A->setVille($this->getReference('ville8'));
        $annonce6A->setDepartement($this->getReference('departement4'));
        $annonce6A->addCategory($this->getReference('category6'));
        $manager->persist($annonce6A);

         $annonce1p = new Annonce();
        $annonce1p->setTitle('Location : villa de nature');
        $annonce1p->setDescription('Changez pour cette maison accompagnée de 3 chambres et d\'une grande terrasse de 40m2 sur le territoire de Villegailhenc dans un quartier non innondable. Construction de 1985.');
        $annonce1p->setImage('villa.jpg');
        $annonce1p->setPrice(1850);
        $annonce1p->setSuperficie(300);
        $annonce1p->setSuperficieTerrain(4000);
        $annonce1p->setDpe('A');
        $annonce1p->setGes('B');
        $annonce1p->setNbrePieces(12);
        $annonce1p->setNbreChambre(5);
        $annonce1p->setSalleBain(3);
        $annonce1p->setWc(2);
        $annonce1p->setGarage('oui');
        $annonce1p->setPiscine('oui');
        $annonce1p->setStatus(2);
        $annonce1p->setVille($this->getReference('ville1'));
        $annonce1p->setDepartement($this->getReference('departement1'));
        $annonce1p->addCategory($this->getReference('category1'));
        $manager->persist($annonce1p);

        $annonce2p = new Annonce();
        $annonce2p->setTitle('Location : Maison de campagne');
        $annonce2p->setDescription('Maison indépendante d\'environ 82m2 Hab (possibilité agrandissement) au calme, à la campagne, sans vis à vis');
        $annonce2p->setImage('villa2.jpg');
        $annonce2p->setPrice(850);
        $annonce2p->setSuperficie(100);
        $annonce2p->setSuperficieTerrain(1000);
        $annonce2p->setDpe('A');
        $annonce2p->setGes('D');
        $annonce2p->setNbrePieces(4);
        $annonce2p->setNbreChambre(2);
        $annonce2p->setSalleBain(1);
        $annonce2p->setWc(1);
        $annonce2p->setGarage('non');
        $annonce2p->setPiscine('non');
        $annonce2p->setStatus(2);
        $annonce2p->setVille($this->getReference('ville3'));
        $annonce2p->setDepartement($this->getReference('departement3'));
        $annonce2p->addCategory($this->getReference('category2'));
        $manager->persist($annonce2p);

        $annonce3p = new Annonce();
        $annonce3p->setTitle('Location : Appartement limitrophe');
        $annonce3p->setDescription('dans résidence récente, sécurisée, calme, année 2013. Appartement de 62m2 comprenant, cuisine ouverte sur salle salon');
        $annonce3p->setImage('appartement.jpg');
        $annonce3p->setPrice(575);
        $annonce3p->setSuperficie(62);
        $annonce3p->setDpe('A');
        $annonce3p->setGes('A');
        $annonce3p->setNbrePieces(3);
        $annonce3p->setNbreChambre(1);
        $annonce3p->setSalleBain(1);
        $annonce3p->setWc(1);
        $annonce3p->setGarage('non');
        $annonce3p->setPiscine('non');
        $annonce3p->setStatus(2);
        $annonce3p->setVille($this->getReference('ville6'));
        $annonce3p->setDepartement($this->getReference('departement1'));
        $annonce3p->addCategory($this->getReference('category3'));
        $manager->persist($annonce3p);

        $annonce3pp = new Annonce();
        $annonce3pp->setTitle('Location : Appartement limitrophe');
        $annonce3pp->setDescription('dans résidence récente, sécurisée, calme, année 2013. Appartement de 62m2 comprenant, cuisine ouverte sur salle salon');
        $annonce3pp->setImage('appartement.jpg');
        $annonce3pp->setPrice(740);
        $annonce3pp->setSuperficie(62);
        $annonce3pp->setDpe('A');
        $annonce3pp->setGes('A');
        $annonce3pp->setNbrePieces(3);
        $annonce3pp->setNbreChambre(1);
        $annonce3pp->setSalleBain(1);
        $annonce3pp->setWc(1);
        $annonce3pp->setGarage('non');
        $annonce3pp->setPiscine('non');
        $annonce3pp->setStatus(2);
        $annonce3pp->setVille($this->getReference('ville6'));
        $annonce3pp->setDepartement($this->getReference('departement1'));
        $annonce3pp->addCategory($this->getReference('category3'));
        $manager->persist($annonce3pp);
        

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
