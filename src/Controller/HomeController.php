<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Entity\Annonce;

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
    public function index(): Response
    {
        return $this->render('home/presentation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/competence', name: 'competence')]
    public function index(): Response
    {
        return $this->render('home/competence.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/annonces', name: 'annonces')]
    public function index(): Response
    {
        return $this->render('home/annonces.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/conditions_generales', name: 'conditions_generales')]
    public function index(): Response
    {
        return $this->render('home/conditions_generales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mentions_legales', name: 'mentions_legales')]
    public function index(): Response
    {
        return $this->render('home/mentions_legales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/espace_client', name: 'espace_client')]
    public function index(): Response
    {
        return $this->render('home/espace_client.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
