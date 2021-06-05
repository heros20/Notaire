<?php

namespace App\Form;

use App\Entity\Departement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DepartementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Département',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
            ->add('codePostal', NumberType::class, [
                'label' => 'N° Département',
                'attr' => ['placeholder' => 'exemple : 14, 76, 27 etc.']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description ( Optionnel )',
                'attr' => ['placeholder' => 'renseignez ici...']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Departement::class,
        ]);
    }
}
