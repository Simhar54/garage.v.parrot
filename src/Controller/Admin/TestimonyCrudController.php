<?php

namespace App\Controller\Admin;

use App\Entity\Testimony;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TestimonyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimony::class;
    }

        public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('is_moderated');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('garage')
                ->setLabel('Garage')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextField::new('lastname')
                ->setLabel('Nom')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextField::new('firstname')
                ->setLabel('Prénom')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextEditorField::new('message')
                ->setLabel('Message')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            IntegerField::new('rating')
                ->setLabel('Note')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            DateField::new('created_at')
                ->setLabel('Date de création')
                ->onlyOnIndex(),
            BooleanField::new('is_moderated')
                ->setLabel('Approuvé')
                ->onlyOnIndex(),
            
           
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        

        return $actions
            ->disable(Action::NEW);
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Témoignage')
            ->setPageTitle('index', 'Témoignages')
            ->setPaginatorPageSize(10);
    }

}