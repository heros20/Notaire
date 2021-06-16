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
    private 
    $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'contact', methods: ['GET', 'POST'])]
    public function new(Request $request, MailerInterface $mailer, UserRepository $repoUser): Response
    {
        $user = $this->getUser();
        $id_user = 1;
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                
            $recipient = $repoUser->find($id_user);
            $contact->setIsRead(false)
            ->setRecipient($recipient);
            $email = new TemplatedEmail();
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
            //$this->addFlash('message', 'Votre email à bien été envoyé');
           // return $this->redirectToRoute('home');
        }
        $user = $this->getUser();
        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
