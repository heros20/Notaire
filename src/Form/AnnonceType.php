<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Ville;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Titre de l\'annonce...']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Description de l\'annonce...']
            ])
            ->add('image', FileType::class,[
                'mapped' => false
            ])
            ->add('superficie', NumberType::class, [
                'label' => 'Superficie (m²)',
                'attr' => ['placeholder' => 'Superficie en chiffres...']
            ])
            ->add('superficieTerrain', NumberType::class, [
                'label' => 'Superficie Terrain (m²)',
                'attr' => ['placeholder' => 'Superficie en chiffres...']
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix ( € )',
                'attr' => ['placeholder' => '300000  ']
            ])
            ->add('status', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    'Vente' => true,
                    'Location' => false,
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('etat', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    '--------' => null,
                    'Vendu' => 'Vendu',
                    'Loué' => 'Loué',
                    'Réservé' => 'Réservé',
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('ville', EntityType::class, [
                'label' => 'Ville *',
                'class' => Ville::class,
                'choice_label' => 'title',
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('category', EntityType::class, [
                'label' => 'Categorie(s) *',
                'class' => Category::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('dpe', NumberType::class, [
                'label' => 'DPE',
                'attr' => ['placeholder' => 'Performance énergétique ...']
            ])
            ->add('ges', NumberType::class, [
                'label' => 'GES',
                'attr' => ['placeholder' => 'Gaz à effet de serre']
            ])
            ->add('nbrePieces', NumberType::class, [
                'label' => 'Nombre de pièce',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
            ->add('nbreChambre', NumberType::class, [
                'label' => 'Nombre de chambre',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
            ->add('salleBain', NumberType::class, [
                'label' => 'Nombre de salle de bain',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
            ->add('wc', NumberType::class, [
                'label' => 'Nombre de toilette',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
            ->add('garage', NumberType::class, [
                'label' => 'Nombre de garage ',
                'attr' => ['placeholder' => "Optionnel..."]
            ])
            ->add('piscine', NumberType::class, [
                'label' => 'Nombre de piscine',
                'attr' => ['placeholder' => "Optionnel..."]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
