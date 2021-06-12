<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Repository\CategoryRepository;
use App\Repository\ContactRepository;
use App\Repository\DepartementRepository;
use App\Repository\ImagesRepository;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;

#[Route('admin/archives')]
class ArchiveController extends AbstractController
{
    #[Route('/', name: 'archives_index')]
    public function index(AnnonceRepository $annonceRepository,CategoryRepository $categoryRepository,ContactRepository $contactRepository,DepartementRepository $departementRepository,ImagesRepository $imagesRepository,UserRepository $userRepository,VilleRepository $villeRepository): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->getFilters()->disable('softdeleteable');
        $annonces = $annonceRepository->findAll();
        $categorys = $categoryRepository->findAll();
        $departements = $departementRepository->findAll();
        $users = $userRepository->findAll();
        $villes = $villeRepository->findAll();
        $em->getFilters()->enable('softdeleteable');

        return $this->render('archives/index.html.twig', [
            'annonces' => $annonces,
            'categorys' => $categorys,
            'departements' => $departements,
            'users' => $users,
            'villes' => $villes,
        ]);
    }
   
}
