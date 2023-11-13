<?php

namespace App\Form\Type;

use App\Entity\Testimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => 'Votre nom',
            'required' => true,
            'attr' => [
                'class' => 'form-control mt-2',
                'name' => 'lastname',
                'id' => 'lastname',
                'oninput' => 'validateFields(this)'
            ],
        ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'required' => true,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'name' => 'firstname',
                    'id' => 'firstname',
                    'oninput' => 'validateFields(this)'
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => true,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'name' => 'message',
                    'id' => 'message',
                    'oninput' => 'validateFields(this)', 
                    'rows' => '5'
                ],
            ])
            ->add('rating', HiddenType::class, [
                'label' => 'Votre note',
                'required' => true,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'name' => 'rating',
                    'id' => 'name',
                    'oninput' => 'validateFields(this)',             
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
