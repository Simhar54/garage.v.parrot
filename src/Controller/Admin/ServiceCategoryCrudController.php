<?php

namespace App\Controller\Admin;

use App\Entity\ServiceCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceCategory::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('name')
            ->setLabel('Nom de la catégorie de service')
            ->setFormTypeOptions([
                'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
            ]),
            AssociationField::new('garage')
            ->setLabel('Garage')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Catégorie de service')
            ->setPageTitle('index', 'Catégories de service')
            ->setPaginatorPageSize(10);
    }

}
