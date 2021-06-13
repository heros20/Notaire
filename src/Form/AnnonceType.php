<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Ville;
use App\Entity\Category;
use App\Entity\Departement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

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
                'label' => 'image(s) supplémentaire',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
            ])
            ->add('fileimage', FileType::class, [
                'label' => 'image à la une',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image sous format jpg, jpeg ou png',
                    ])
                ],
            ])
            ->add('superficie', NumberType::class, [
                'label' => 'Superficie (m²)',
                'attr' => ['placeholder' => 'Superficie en chiffres...']
            ])
            ->add('superficieTerrain', NumberType::class, [
                'label' => 'Superficie Terrain (m²)',
                'attr' => ['placeholder' => 'optionnel...']
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix ( € )',
                'attr' => ['placeholder' => '300 000  ']
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
            ->add('departement', EntityType::class, [
                'label' => 'Departement *',
                'class' => Departement::class,
                'choice_label' => 'title',
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('category', EntityType::class, [
                'label' => 'Categorie(s) *',
                'class' => Category::class,
                'choice_label' => 'title',
                'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('dpe', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'F' => 'F',
                    'G' => 'G',
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('ges', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'F' => 'F',
                    'G' => 'G',
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
             ->add('nbrePieces', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('nbreChambre', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10'
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('salleBain', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('wc', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
             ->add('garage', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('piscine', ChoiceType::class, [
                'attr' => ['class' => 'p-2'],
                'choices'  => [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                // 'multiple' => true,
                // 'expanded' => true,
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
