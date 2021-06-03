<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('image', FileType::class)
            ->add('superficie')
            ->add('superficieTerrain')
            ->add('price')
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Vente' => true,
                    'Location' => false,
                    '--------' => null,
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('etat', ChoiceType::class, [
                'choices'  => [
                    'Vendu' => true,
                    'Loué' => false,
                    '--------' => null,
                ],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('dpe')
            ->add('ges')
            ->add('nbrePieces')
            ->add('nbreChambre')
            ->add('salleBain')
            ->add('wc')
            ->add('garage')
            ->add('piscine')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
