<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotNull;

class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email*',
                'label_attr' => ['class' => 'formConnex_label1'],
                'attr' => ['class' => 'class="form-control-material"'],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez renseigner votre Email',
                    ]),

                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom*',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => 'class="form-control-material"'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Email',
                    ]),

                ],
            ])
            ->add('username', TextType::class, [
                'label' => 'Prénom*',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => 'class="form-control-material"'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Email',
                    ]),

                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numero',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => 'class="form-control-material"']
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
