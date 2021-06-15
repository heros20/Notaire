<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Category;
use App\Entity\Ville;
use App\Entity\Departement;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\formBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SearchForm extends AbstractType
{
    public function buildForm(formBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['class' => 'filter_selecte'],
                'class' => Category::class,
                // 'expanded' => true,
                'multiple' => true
            ])
            ->add('ville', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Ville::class,
                'choice_label' => 'title',
                // 'expanded' => true,
                'multiple' => true,
                'attr' => ['class' => 'filter_selecte'],
            ])
            ->add('departement', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Departement::class,
                'choice_label' => 'title',
                // 'expanded' => true,
                'multiple' => true,
                'attr' => ['class' => 'filter_selecte'],
            ])
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    '-----' => NULL,
                    'Vente' => true,
                    'Location' => false,
                ],
                'attr' => ['class' => 'filter_selecte'],
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix min',
                    'class' => 'filter_input'
                ]
            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' =>
                    'Prix max',
                    'class' => 'filter_input'
                ]
            ]);
    }

    public function configurationOptions(optionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            //'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
