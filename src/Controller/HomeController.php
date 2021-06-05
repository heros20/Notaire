<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
    public function annonces(): Response
    {
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
            [],
            ['title' => 'ASC']
        );
        return $this->render('home/annonces.html.twig', [
            'annonces' => $annonces,
        ]);
    }
     #[Route('/annonces/{id}', name: 'annonce_show', methods: ['GET'])]
    public function show(Annonce $annonce): Response
    {
        return $this->render('home/show.html.twig', [
            'annonce' => $annonce,
        ]);
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
