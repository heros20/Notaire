<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Region;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,array(
                'label' => 'Titre *'
            ))
            ->add('description',TextareaType::class,array(
                'label' => 'Description *'
            ))
            ->add('actif')
            ->add('region',EntityType::class, array(
                'class' => Region::class,
                'choice_label' => 'title',
                // 'multiple' => true,
                // 'expanded' => true,
            ))
            ->add('categorys',EntityType::class, array(
                'class' => Category::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
