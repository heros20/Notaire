<?php

namespace App\Controller;

use App\Entity\Contact;
use App\entity\User;
use App\Form\ContactType;
use Symfony\Component\Security\Core\Security;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
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
    public function new(Request $request, MailerInterface $mailer): Response
    {
        $user = $this->getUser();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                
            $contact->setIsRead(false)
            ->setRecipient($this->getDoctrine()
            ->getRepository(User::class)
            ->find($user->getId()));            $email = new TemplatedEmail();
            if ($this->security->isGranted('ROLE_USER')) {
                $contact->setSender($this->getUser());
                $email->from($contact->getSender()->getEmail())
                ->context([
                    'contact' => $contact,
                    'mail' => $contact->getSender()->getEmail(),
                    'message' => $contact->getMessage()
                ]);
            }else {
                $email->from($contact->getEmail())
                ->context([
                    'contact' => $contact,
                    'mail' => $contact->getEmail(),
                    'message' => $contact->getMessage()
                ]);
            }
                $email->to(new Address('sebastienweb27@gmail.com'))
                ->subject('Contact')
                ->htmlTemplate('emails/contact.html.twig');
              
            $mailer->send($email);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('message', 'Votre email à bien était envoyez');
            return $this->redirectToRoute('home');
        }
        $user = $this->getUser();
        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
            'user' => $user
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
