<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Entity\Annonce;
use App\Entity\Category;
use App\Entity\Ville;
use App\Entity\Departement;
use App\Entity\Contact;
use App\entity\User;
use App\Form\ContactType;
use Symfony\Component\Security\Core\Security;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class HomeController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
            [],
            ['createdAt' => 'DESC']
        );
        return $this->render('home/index.html.twig', [
            'annonces' => $annonces
        ]);
        
    }

    #[Route('/presentation', name: 'presentation')]
    public function presentation(): Response
    {
        return $this->render('home/presentation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/competence', name: 'competence')]
    public function competence(): Response
    {
        return $this->render('home/competence.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/annonces', name: 'annonces')]
    public function annonces(AnnonceRepository $repository,Request $request): Response
    {
        // $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findBy(
        //     [], 
        //     ['createdAt' => 'DESC']
        // );
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data, [
            'method' => 'GET',
        ]);
        $form->handleRequest($request);
        [$min, $max] = $repository->findMinMax($data);
        $searchAnnonce = $repository->findSearch($data);
        
        // dd($searchAnnonce);
        return $this->render('home/annonces.html.twig', [
            // 'annonces' => $annonces,
            'searchAnnonce' => $searchAnnonce,
            'form' => $form->createView(),
            'min' => $min,
            'max' => $max
        ]);
    }
    #[Route('/annonces/{slug}', name: 'frontAnnonce_show', methods: ['GET', 'POST'])]
    public function show(Annonce $annonce,Request $request, MailerInterface $mailer, UserRepository $repoUser): Response
    {   
        $user = $this->getUser();
        $id_user = 2;
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $recipient = $repoUser->find($id_user);
            $contact->setIsRead(false)
            ->setAnnonce($annonce)
            ->setRecipient($recipient);
            $email = new TemplatedEmail();
            $message ='<p></p>';
            $message .='<h1 style="background-color:lime">'.$annonce->getTitle().'</h1>';
            $message .= '<p>'.$contact->getMessage().'</p>';
            if ($this->security->isGranted('ROLE_USER')) {
                $message .= '<p>'.$user->getName().'</p>';
                $message .= '<p>'.$user->getUsername().'<p>';
                $contact->setSender($this->getUser());
                $email->from($contact->getSender()->getEmail())
                ->context([
                    'contact' => $contact,
                    'mail' => $contact->getSender()->getEmail(),
                    'message' => $message,
                ]);
            }else {
                $message .= '<p>'.$contact->getName().'</p>';
                $email->from($contact->getEmail())
                ->context([
                    'contact' => $contact,
                    'mail' => $contact->getEmail(),
                    'message' => $message,
                ]);
            }
                $email->to(new Address('sebastienweb27@gmail.com'))
                ->subject('Contact')
                ->htmlTemplate('emails/contact.html.twig');
              
            $mailer->send($email);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('message', 'Votre email à bien était envoyé');
            return $this->redirectToRoute('home');
        }
        $user = $this->getUser();
        return $this->render('home/show.html.twig', [
            'annonce' => $annonce,
            'contact' => $contact,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
    #[Route('/annonces/favoris/ajout/{id}', name: 'ajout_favoris')]
    public function ajoutFavoris(Annonce $annonce): Response
    {
        if (!$annonce) {
            throw new NotFoundHttpException('Pas d\'annonce trouvée');
        }
        $annonce->addFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return $this->redirectToRoute('favoris');
    }
     #[Route('/annonces/favoris/retrait/{id}', name: 'retrait_favoris')]
    public function retraitFavoris(Annonce $annonce): Response
    {
        if (!$annonce) {
            throw new NotFoundHttpException('Pas d\'annonce trouvée');
        }
        $annonce->removeFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return $this->redirectToRoute('favoris');
    }

    #[Route('/conditions_generales', name: 'conditions_generales')]
    public function conditionsLenerales(): Response
    {
        return $this->render('home/conditions_generales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mentions_legales', name: 'mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('home/mentions_legales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
