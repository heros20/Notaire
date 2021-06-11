<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;
use App\Repository\CategoryRepository;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(AnnonceRepository $annonceRepository,UserRepository $userRepository,VilleRepository $villeRepository,CategoryRepository $categoryRepository, DepartementRepository $departementRepository): Response
    {
        $annonces = $annonceRepository->findAll();
        $countAnnonces = $annonceRepository->countById($annonces);

        $users = $userRepository->findAll();
        $countUsers = $userRepository->countById($users);

        $villes = $villeRepository->findAll();
        $countvilles = $villeRepository->countById($villes);

        $categorys = $categoryRepository->findAll();
        $countcategorys = $categoryRepository->countById($categorys);

        $departements = $departementRepository->findAll();
        $countdepartements = $departementRepository->countById($departements);

        return $this->render('admin/index.html.twig', [
            'countAnnonces' => $countAnnonces,
            'countUsers' => $countUsers,
            'countvilles' => $countvilles,
            'countcategorys' => $countcategorys,
            'countdepartements' => $countdepartements
        ]);
    }
    #[Route('/admin/utilisateur', name: 'utilisateur_index')]
    public function utilisateur(UserRepository $userRepository): Response
    {
        return $this->render('admin/utilisateur.html.twig',[
            'users' => $userRepository->findAll()
        ]);
    }
    #[Route('/admin/{id}', name: 'utilisateur_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('admin/showUser.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/user/{id}', name: 'user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('utilisateur_index');
    }
}
