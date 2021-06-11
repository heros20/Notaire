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

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email*',
                'label_attr' => ['class' => 'formConnex_label1'],
                'attr' => ['class' => "form-control-material"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Email',
                    ]),

                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom*',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => "form-control-material"]
            ])
            ->add('username', TextType::class, [
                'label' => 'Prénom*',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => "form-control-material"]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numero',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => "form-control-material"]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' =>'Accepter les conditions d\'utilisation',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisations',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'invalid_message' => 'Veuillez renseigner des mot de passe identique.',
                'first_options'  => ['label' => 'Mot de passe*', 'label_attr' => ['class' => 'formConnex_label2'], 'attr' => ['class' => "form-control-material"]],
                'second_options' => ['label' => 'Confirmation mot de passe*', 'label_attr' => ['class' => 'formConnex_label2'], 'attr' => ['class' => "form-control-material"]],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit avoir {{ limit }} caractère minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
