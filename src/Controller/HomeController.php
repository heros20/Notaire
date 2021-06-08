<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Entity\Annonce;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
            [],
            ['createdAt' => 'DESC']
        );
        return $this->render('home/index.html.twig', [
            'annonces' => $annonces
        ]);
        
    }

    #[Route('/presentation', name: 'presentation')]
    public function presentation(): Response
    {
        return $this->render('home/presentation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/competence', name: 'competence')]
    public function competence(): Response
    {
        return $this->render('home/competence.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/annonces', name: 'annonces')]
    public function annonces(AnnonceRepository $repository,Request $request): Response
    {
        // $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
        //     [], 
        //     ['createdAt' => 'DESC']
        // );
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data, [
            'method' => 'GET',
        ]);
        $form->handleRequest($request);
        $searchAnnonce = $repository->findSearch($data);
        return $this->render('home/annonces.html.twig', [
            // 'annonces' => $annonces,
            'searchAnnonce' => $searchAnnonce,
            'form' => $form->createView()
        ]);
    }
    #[Route('/annonces/{id}', name: 'annonce_show', methods: ['GET'])]
    public function show(Annonce $annonce): Response
    {
        return $this->render('home/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }
    #[Route('/annonces/favoris/ajout/{id}', name: 'ajout_favoris')]
    public function ajoutFavoris(Annonce $annonce): Response
    {
        if (!$annonce) {
            throw new NotFoundHttpException('Pas d\'annonce trouvée');
        }
        $annonce->addFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return $this->redirectToRoute('annonces');
    }
     #[Route('/annonces/favoris/retrait/{id}', name: 'retrait_favoris')]
    public function retraitFavoris(Annonce $annonce): Response
    {
        if (!$annonce) {
            throw new NotFoundHttpException('Pas d\'annonce trouvée');
        }
        $annonce->removeFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return $this->redirectToRoute('annonces');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/conditions_generales', name: 'conditions_generales')]
    public function conditionsLenerales(): Response
    {
        return $this->render('home/conditions_generales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mentions_legales', name: 'mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('home/mentions_legales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
