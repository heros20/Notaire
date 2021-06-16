<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\InfoType;
use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;
use App\Repository\CategoryRepository;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
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
       
        return $this->render('admin/show-user.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/utilisateur/{id}/edit', name: 'utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $originalPassword = $user->getPassword();
        $form = $this->createForm(InfoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user->setPassword($originalPassword);
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
    public function admin_profil(Request $request): Response
    {
        $user = $this->getUser();
        return $this->render('admin/profil_admin.html.twig', [
            'user' => $user
        ]);
    }
    #[Route('/profil/edit', name: 'edit_profil_admin')]
    public function edit_admin_profil(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(InfoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setModifiedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('profil_admin');
        }
        return $this->render('admin/edit_profil_admin.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/notif', name: 'notif_admin')]
    public function admin_notif(): Response
    {
        $user = $this->getUser();
        return $this->render('admin/notif_admin.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/notif/show/{id}', name: 'notif_show_admin')]
    public function admin_show_notif(Contact $message): Response
    {
        $user = $this->getUser();
        $message->setIsRead(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();
        return $this->render('admin/notif_show_admin.html.twig', [
            'contact' => $message,
            'user' => $user
        ]);
    }
    
    #[Route('/notif/delete/{id}', name: 'notif_delete')]
    public function notifDelete(Contact $message): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($message);
        $em->flush();
        return $this->redirectToRoute('notif_admin');
    }
    
    #[Route('/utilisateur/message/{id}', name: 'utilisateur_notif')]
    public function reponse(Request $request, $id,Contact $message): Response {
        $user = $this->getUser();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                
            $contact->setIsRead(false)
                ->setSender($this->getDoctrine()
                ->getRepository(User::class)
                ->find($user->getId()))
                ->setRecipient($this->getDoctrine()
                ->getRepository(User::class)
                ->find($id));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('message', 'Votre message à bien était envoyez');
            return $this->redirectToRoute('notif_admin');
        }
        return $this->render('admin/form_notif_user.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
    #[Route('/notif/message', name: 'notif_new')]
    public function message(Request $request): Response {
        $user = $this->getUser();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                
            $contact->setIsRead(false)
                ->setSender($this->getDoctrine()
                ->getRepository(User::class)
                ->find($user->getId()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('message', 'Votre message à bien était envoyez');
            return $this->redirectToRoute('notif_admin');
        }
        return $this->render('admin/form_notif.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
