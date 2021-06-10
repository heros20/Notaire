<?php

namespace App\Form;

use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class, [
            'label' => 'Nom de la ville',
            'attr' => ['placeholder' => 'Nom de la ville...']
        ])
        ->add('codePostal', NumberType::class, [
            'label' => 'Code Postal',
            'attr' => ['placeholder' => 'Code postal de la ville...']
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description ( Optionnel )',
            'attr' => ['placeholder' => 'Description de la ville...']
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ville::class,
        ]);
    }
}
