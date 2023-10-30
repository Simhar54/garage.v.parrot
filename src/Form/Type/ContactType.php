<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => 'Votre nom',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ]
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Votre prénom',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ]
        ])
        ->add('phoneNumber', TextType::class, [
            'label' => 'Votre téléphone',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Adresse e-mail',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ]
        ])
        ->add('subject', TextType::class, [
            'label' => 'Votre sujet',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ]
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Votre message',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'id' => 'name',
                'oninput' => 'validateFields(this)',
                'rows' => '5'
            ]
        ]);
    }
}