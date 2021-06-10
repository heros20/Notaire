<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;
use App\Entity\User;
use App\Form\InfoType;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'profile')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user
        ]);
    }
    #[Route('/{id}/edit', name: 'infos_perso_edit', methods: ['GET', 'POST'])]
    public function infos_persoEdit(Request $request, User $user): Response
    {

        $form = $this->createForm(InfoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile');
        }

        $user = $this->getUser();
        return $this->render('profile/edit.html.twig', [
            'controller_name' => 'ProfileController',
            'form' => $form->createView(),
            'user' => $user
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

    #[Route('/favoris', name: 'favoris')]
    public function favori(): Response
    {
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
            [],
            ['title' => 'ASC']
        );
        $users = $this->getDoctrine()->getRepository(User::class)->findBy(
            [],
            ['name' => 'ASC']
        );
        return $this->render('profile/favoris.html.twig', [
            'annonces' => $annonces,
            'users' => $users
        ]);
    }
     #[Route('/favoris/retrait/{id}', name: 'remove_favoris')]
    public function retraitFavoris(Annonce $annonce): Response
    {
        $annonce->removeFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return $this->redirectToRoute('favoris');
    }
    #[Route('/favoris/show', name: 'favoris_show')]
    public function favoriShow(): Response
    {
        return $this->render('profile/favoris_show.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    #[Route('/favoris/edit', name: 'favoris_edit')]
    public function favoriEdit(): Response
    {
        return $this->render('profile/favoris_edit.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
