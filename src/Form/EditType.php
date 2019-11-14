<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, [
            'attr' => [
                    'placeholder' => 'Username',
                    'class' => 'form-input'
            ]
    ])
    ->add('email', EmailType::class, [
        'attr' => [
                'placeholder' => 'Email address',
                'class' => 'form-input'
        ]
    ])
    ->add('password', RepeatedType::class, [
        'type' => PasswordType::class,
        'required' => true,
        'first_options' => [
            'label' => 'Password',
            'attr' => [
                    'placeholder' => 'Password',
                    'class' => 'form-input'
                    
            ]
        ],
        'second_options' => [
            'label' => 'Repeat Password',
            'attr' => [
                    'placeholder' => 'Repeat Password',
                    'class' => 'form-input'
            ]
        ],
    ])
    ->add('register', SubmitType::class, [
        'label' => 'Submit',
        'attr' => [
            'class' => 'edit-button'
        ]
    ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           
        ]);
    }
}

?>