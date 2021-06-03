<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Chaumière Normande']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Maison situé plein sud...']
            ])
            ->add('image', FileType::class)
            ->add('superficie', NumberType::class, [
                'label' => 'Superficie',
                'attr' => ['placeholder' => '20m²']
            ])
            ->add('superficieTerrain', NumberType::class, [
                'label' => 'Superficie Terrain',
                'attr' => ['placeholder' => '1ha']
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix',
                'attr' => ['placeholder' => '300 000 € ']
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
            ->add('dpe', NumberType::class, [
                'label' => 'DPE',
                'attr' => ['placeholder' => '100']
            ])
            ->add('ges', NumberType::class, [
                'label' => 'GES',
                'attr' => ['placeholder' => '100']
            ])
            ->add('nbrePieces', NumberType::class, [
                'label' => 'Nombre de pièce',
                'attr' => ['placeholder' => '4']
            ])
            ->add('nbreChambre', NumberType::class, [
                'label' => 'Nombre de chambre',
                'attr' => ['placeholder' => '2']
            ])
            ->add('salleBain', NumberType::class, [
                'label' => 'Nombre de salle de bain',
                'attr' => ['placeholder' => '1']
            ])
            ->add('wc', NumberType::class, [
                'label' => 'Nombre de toilette',
                'attr' => ['placeholder' => '1']
            ])
            ->add('garage', NumberType::class, [
                'label' => 'Nombre de garage',
                'attr' => ['placeholder' => "S'il n'y a pas de garage ne remplissez pas"]
            ])
            ->add('piscine', NumberType::class, [
                'label' => 'Nombre de piscine',
                'attr' => ['placeholder' => "S'il n'y a pas de garage ne remplissez pas"]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
