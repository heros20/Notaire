<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use app\entity\Annonce;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $date = new DateTime();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'date' => $date
        ]);
    }

    #[Route('/contact', name: 'contactpage')]
    public function contact(): Response
    {
        $michel = 'michel';
        $fruits = ['papaye','kiwi','banane'];
       
        return $this->render('home/contact.html.twig',[
            'name' => $michel,
            'fruits' => $fruits
        ]);
    }
}
