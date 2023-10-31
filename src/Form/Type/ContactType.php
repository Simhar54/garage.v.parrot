<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;


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
                'name' => 'lastname',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre nom'
                ]),
                new Assert\Length([
                    'min' => 1,
                    'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères',
                    'max' => 50,
                    'maxMessage' => 'Votre nom doit contenir au maximum {{ limit }} caractères'
                ])
            ]
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Votre prénom',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'firstname',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre nom'
                ]),
                new Assert\Length([
                    'min' => 1,
                    'minMessage' => 'Votre prénom doit contenir au moins {{ limit }} caractères',
                    'max' => 50,
                    'maxMessage' => 'Votre prénom doit contenir au maximum {{ limit }} caractères'
                ])
            ]
        ])
        ->add('phoneNumber', TextType::class, [
            'label' => 'Votre téléphone',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'phoneNumber',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre numéro de téléphone'
                ]),
                new Assert\Length([
                    'min' => 10,
                    'minMessage' => 'Votre numero de téléphone doit contenir au moins {{ limit }} caractères',
                    'max' => 20,
                    'maxMessage' => 'Votre numéro de téléphone doit contenir au maximum {{ limit }} caractères'
                ]),
                new Assert\Regex([
                    'pattern' => '/^\+?\d{10,20}$/',
                    'message' => 'Veuillez entrer un numéro de téléphone valide. Seuls les chiffres et éventuellement un "+" au début sont autorisés.',
                ]),
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Adresse e-mail',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'email',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre adresse e-mail'
                ]),
                new Assert\Email([
                    'message' => 'Veuillez renseigner une adresse e-mail valide'
                ])
            ]
        ])
        ->add('subject', TextType::class, [
            'label' => 'Votre sujet',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'subject',
                'id' => 'name',
                'oninput' => 'validateFields(this)'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre sujet'
                ]),
                new Assert\Length([
                    'min' => 1,
                    'minMessage' => 'Votre sujet doit contenir au moins {{ limit }} caractères',
                    'max' => 200,
                    'maxMessage' => 'Votre sujet doit contenir au maximum {{ limit }} caractères'
                ])
            ]

        ])
        ->add('message', TextareaType::class, [
            'label' => 'Votre message',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'message',
                'id' => 'name',
                'oninput' => 'validateFields(this)', 
                'rows' => '5'
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Veuillez renseigner votre message'
                ]),
                new Assert\Length([
                    'min' => 1,
                    'minMessage' => 'Votre message doit contenir au moins {{ limit }} caractères',
                    'max' => 5000,
                    'maxMessage' => 'Votre message doit contenir au maximum {{ limit }} caractères'
                ])
            ]
        ]);
    }
}