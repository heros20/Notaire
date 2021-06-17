<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Images;
use App\Form\AnnonceType;
use App\Form\ImagesAnnonceType;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\File;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('admin/annonce')]
class AnnonceController extends AbstractController
{
    #[Route('/', name: 'annonce_index', methods: ['GET'])]
    public function index(AnnonceRepository $annonceRepository): Response
    {   
        $annonces = $annonceRepository->findBy(
            [],
            ['createdAt' => 'DESC']
        );
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }

    #[Route('/new', name: 'annonce_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // /** @var UploadedFile $imageFile */
            // $imageMultiple = $form->get('image')->getData();
            $annonceFile = $form->get('fileimage')->getData();
            // foreach ($imageMultiple as $image) {
            //     // on genere un nouveau nom de fichier
            //     $fichier = md5(uniqid()). '.' . $image->guessExtension();
            //     // on copie le fichier dans le dossier uploads
            //     $image->move(
            //         $this->getParameter('images_directory'),
            //         $fichier
            //     );
                
            //     // on stock l'image dans la Bdd (son nom)
            //     $img = new Images();
            //     $img->setName($fichier);
            //     $annonce->addImage($img);
            // }
            if ($annonceFile) {
                $annonceFileName = $fileUploader->upload($annonceFile);
                $annonce->setimage($annonceFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('annonce_index');

        }

        return $this->render('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'annonce_show', methods: ['GET'])]
    public function show(Annonce $annonce): Response
    {
        
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    #[Route('/{id}/edit', name: 'annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonce $annonce, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             /** @var UploadedFile $imageFile */
             $imageMultiple = $form->get('image')->getData();
             $annonceFile = $form->get('fileimage')->getData();
           // foreach ($imageMultiple as $image) {
                // // on genere un nouveau nom de fichier
                // $fichier = md5(uniqid()). '.' . $image->guessExtension();
                // // on copie le fichier dans le dossier uploads
                // $image->move(
                //     $this->getParameter('images_directory'),
                //     $fichier
                // );
                
                // on stock l'image dans la Bdd (son nom)
                // $img = new Images();
                // $img->setName($fichier);
                // $annonce->addImage($img);
            //}
            if ($annonceFile) {
                $annonceFileName = $fileUploader->upload($annonceFile);
                $annonce->setimage($annonceFileName);
            }
            $this->getDoctrine()->getManager()->flush();
            // $form['image']->getData();

            return $this->redirectToRoute('annonce_index');
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'annonce_delete', methods: ['POST'])]
    public function delete(Request $request, Annonce $annonce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($annonce);
            $entityManager->flush();
        }

        return $this->redirectToRoute('annonce_index');
    }

    #[Route('/supprimer/image/{id}', name: 'annonce_delete_image', methods: ["POST"])]
    public function deleteImage(Images $image, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        // on verifie si le token est valide
        // if ($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])) {
            // on recupere le nom de l'image
            $nom = $image->getName();
            // on supprime le fichier
            unlink($this->getParameter('images_directory').'/'.$nom);
            // on supprime l'entrée de la Bdd
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();

            // on répond en Json
            return new JsonResponse(['success' => 1]);
        
        // else {
        //     return new JsonResponse(['error' => 'token invalide'], 400);
        // }
    }
    #[Route('/add/images/{id}', name: 'add_new_images', methods: ['GET', 'POST'])]
    public function AddImages(Request $request, Annonce $annonce): Response
    {
        $form = $this->createForm(ImagesAnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageMultiple = $form->get('image')->getData();
          foreach ($imageMultiple as $image) {
               // on genere un nouveau nom de fichier
                $fichier = md5(uniqid()). '.' . $image->guessExtension();
               // on copie le fichier dans le dossier uploads
                $image->move(
                   $this->getParameter('images_directory'),
                   $fichier
               );
               
                // on stock l'image dans la Bdd (son nom)
                $img = new Images();
                $img->setName($fichier);
               $annonce->addImage($img);
          }
           $this->getDoctrine()->getManager()->flush();
           // $form['image']->getData();

           return $this->redirectToRoute('annonce_index');
       }

        return $this->render('images_annonce/index.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }
}



