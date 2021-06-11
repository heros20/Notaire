<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotNull;
use     Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        $builder
            ->add('message', TextType::class,[
                'label' => 'Message *'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
