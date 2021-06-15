<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;
use App\Entity\Contact;
use App\Entity\User;
use App\Form\InfoType;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\File;
use App\Service\FileUploader;
use AsyncAws\Ses\ValueObject\Message;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormError;

#[Route('/profil')]
class ProfileController extends AbstractController
{

    #[Route('/', name: 'profile')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user
        ]);
    }
    #[Route('/edit', name: 'infos_perso_edit', methods: ['GET', 'POST'])]
    public function infos_persoEdit(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }

        $form = $this->createForm(InfoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setModifiedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('profile');
        }

        return $this->render('profile/edit.html.twig', [
            'controller_name' => 'ProfileController',
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/notification', name: 'notif')]
    public function notif(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        return $this->render('profile/notification.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user,
        ]);
    }
    #[Route('/notification/show/{id}', name: 'notif_show')]
    public function notifShow(Contact $message): Response
    {   
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        $message->setIsRead(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();

        return $this->render('profile/notif_show.html.twig', [
            'controller_name' => 'ProfileController',
            'contact' => $message,
        ]);
    }
    
    #[Route('/notif/delete/{id}', name: 'notification_delete')]
    public function notifDelete(Contact $message): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($message);
        $em->flush();
        return $this->redirectToRoute('notif');
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
}
