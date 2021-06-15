<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPassType;
use App\Form\ForgetPasswordType;
use App\Form\RegistrationFormType;
use App\Form\ResetType;
use App\Security\EmailVerifier;
use DateTime;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('notarial@gmail.com', 'agence notarial'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            return $this->redirectToRoute('attente');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verification-email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('profile');
    }
    #[Route('/verification', name: 'attente')]
    public function attente()
    {
        return $this->render('emails/attente.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/email', name: 'forget')]
    public function forget_password(Request $request, MailerInterface $mailer, TokenGeneratorInterface $tokenInterface)
    {
        $form = $this->createForm(ForgetPasswordType::class)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = $form->getData("email");
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["email"=>$email["email"]]);

            if(!$user){
                $form->addError(new FormError("email inconnu"));
            }else{
                $token = $tokenInterface->generateToken();
                $user->setResetToken($token)
                ->setResetTokenAt(new DateTime("now"));
                $this->getDoctrine()->getManager()->persist($user);
                $this->getDoctrine()->getManager()->flush();

                $url = $this->generateUrl("reset",['token' =>$token], UrlGeneratorInterface::ABSOLUTE_URL);
                $mail = (new TemplatedEmail())
                ->from('seb@gmail.com')
                ->to($user->getEmail())
                ->subject('Mot de passe oublié')
                ->htmlTemplate('emails/motdepasse.html.twig')
                ->context([
                    "url" => $url
                ]);
            $mailer->send($mail);
            }
        }
        return $this->render('emails/mdp.html.twig',[
            'form' => $form->createView()
        ]);
    }
    #[Route('/mot-de-passe/{token}', name: 'reset')]
    public function reset(Request $request, $token, UserPasswordHasherInterface $passwordHasher){
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["reset_token" =>$token]);
        //Vérifier l'utilisateur existe ou pas
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        
        $form = $this->createForm(ResetType::class)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setResetToken(null);
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('emails/reset.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/mdp/edit', name: 'update_pass')]
    public function resetPassword(Request $request, UserPasswordHasherInterface $passwordHasher){
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('404');
        }
        $form = $this->createForm(ResetType::class)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('emails/reset.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
