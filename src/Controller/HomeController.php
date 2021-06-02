<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use 

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
        return $this->render('presentation/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/competence', name: 'competence')]
    public function index(): Response
    {
        return $this->render('competence/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/annonces', name: 'annonces')]
    public function index(): Response
    {
        return $this->render('annonces/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/condition_generale', name: 'condition_generale')]
    public function index(): Response
    {
        return $this->render('condition_generale/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mentions_legales', name: 'mentions_legales')]
    public function index(): Response
    {
        return $this->render('mentions_legales/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/espace_client', name: 'espace_client')]
    public function index(): Response
    {
        return $this->render('espace_client/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
