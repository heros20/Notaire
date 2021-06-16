<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotNull;
use     Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->security->isGranted('ROLE_ADMIN')){
            $builder
            ->add('recipient', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'label' => 'Destinataire *',
                'label_attr' => ['class' => 'formConnex_label2'],
                'attr' => ['class' => 'class="form-control-material"'],
                'empty_data' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Email',
                    ])
                ]
            ]);
        }
        if (!$this->security->isGranted('ROLE_USER')) {
            $builder
                ->add('name', TextType::class, [
                    'label' => 'Nom *',
                    'label_attr' => ['class' => 'formConnex_label2'],
                    'attr' => ['class' => 'class="form-control-material"'],
                ])
                ->add('email', EmailType::class, [
                    'label' => 'Email *',
                    'label_attr' => ['class' => 'formConnex_label2'],
                    'attr' => ['class' => "form-control-material"]
                ])
                ->add('phone');
        }
        else {
            
        }
        $builder
            ->add('message', TextareaType::class, [
                'label' => 'Message *',
                'empty_data' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Email',
                    ])
                ]
            ]);     
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
