<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    private $security;

        public function __construct(Security $security)
        {
            $this->security = $security;
        }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         if ($this->security->isGranted('ROLE_USER')) {
            $user = $this->security->getUser();
        if ($user) {
           $builder
                ->getData('user')
           ;
        }
        } else {
            $builder         
            ->add('name')
            ->add('email')
            ->add('phone')
            ;
        }      
        $builder
            ->add('message')
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
