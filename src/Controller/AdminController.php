<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InfoType;
use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;
use App\Repository\CategoryRepository;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'admin')]
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
    #[Route('/utilisateur', name: 'utilisateur_index')]
    public function utilisateur(UserRepository $userRepository): Response
    {
        return $this->render('admin/user.html.twig',[
            'users' => $userRepository->findAll()
        ]);
    }
    #[Route('/utilisateur/{id}', name: 'utilisateur_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        dd($user);
        return $this->render('admin/show-user.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/utilisateur/{id}/edit', name: 'utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(InfoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_index');
        }

        return $this->render('admin/edit-user.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
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
    
    #[Route('/profil', name: 'profil_admin')]
    public function admin_profil(): Response
    {
        $user = $this->getUser();
        return $this->render('admin/profil_admin.html.twig', [
            'admin' => $user
        ]);
    }
    
    // public function recup_admin_profil(User $user): Response
    // {
    //     dd($user);
    //     return $this->render('header.html.twig', [
    //         'admin' => $user
    //     ]);
    // }
}
