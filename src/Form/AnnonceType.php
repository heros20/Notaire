<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('image')
            ->add('superficie')
            ->add('superficieTerrain')
            ->add('price')
            ->add('status')
            ->add('etat')
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
