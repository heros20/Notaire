<?php

namespace App\Controller;

use App\Entity\Contact;
use App\entity\User;
use App\Form\ContactType;
use Symfony\Component\Security\Core\Security;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact')]
class ContactController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    // #[Route('/', name: 'contact', methods: ['GET'])]
    // public function index(ContactRepository $contactRepository): Response
    // {
    //     return $this->render('contact/index.html.twig', [
    //         'contacts' => $contactRepository->findAll(),
    //     ]);
    // }


    #[Route('/', name: 'contact', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $contact->setEtat(false);
            if ($this->security->isGranted('ROLE_USER')) {
            $contact->addUser($this->getUser());
            }
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    // #[Route('/{id}', name: 'contact_show', methods: ['GET'])]
    // public function show(Contact $contact): Response
    // {
    //     return $this->render('contact/show.html.twig', [
    //         'contact' => $contact,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'contact_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Contact $contact): Response
    // {
    //     $form = $this->createForm(ContactType::class, $contact);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('contact');
    //     }

    //     return $this->render('contact/edit.html.twig', [
    //         'contact' => $contact,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // #[Route('/{id}', name: 'contact_delete', methods: ['POST'])]
    // public function delete(Request $request, Contact $contact): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($contact);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('contact');
    // }
}
