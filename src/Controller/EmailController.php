<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function index(): Response
    {
        $user = $this->getUser();
        
        // return $this->redirectToRoute('home');
        
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
            [],
            ['createdAt' => 'DESC'],
            $limit = 2,
        );


        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
            'user' => $user,
            'annonces' => $annonces,
        ]);
    }

    public function contact(): Response
    {
        $user = $this->getUser();
        
        return $this->redirectToRoute('home');

        return $this->render('emails/contact.html.twig', [
            'controller_name' => 'EmailController',
            'user' => $user,
        ]);
    }
}
