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
    #[Route('/notification/show', name: 'notif_show')]
    public function notifShow(): Response
    {
        return $this->render('profile/notification_show.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    
    #[Route('/informations_personnelles', name: 'infos_perso')]
    public function infos_preso(): Response
    {
        return $this->render('profile/infos_perso.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    #[Route('/informations_personnelles/edit', name: 'infos_perso_edit')]
    public function infos_preso(): Response
    {
        return $this->render('profile/infos_perso_edit.html.twig', [
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
    #[Route('/favoris/show', name: 'favoris_show')]
    public function favori(): Response
    {
        return $this->render('profile/favoris_show.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    #[Route('/favoris/edit', name: 'favoris_edit')]
    public function favori(): Response
    {
        return $this->render('profile/favoris_edit.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
