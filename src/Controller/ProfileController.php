<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/notification', name: 'notif')]
    public function notif(): Response
    {
        return $this->render('profile/notification.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    
    #[Route('/informations_personnelles', name: 'infos_perso')]
    public function infos_preso(): Response
    {
        return $this->render('profile/informations_personnelles.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    
    #[Route('/favoris', name: 'favoris')]
    public function favori(): Response
    {
        return $this->render('profile/favoris.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
