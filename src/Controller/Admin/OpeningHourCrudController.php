<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHour;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class OpeningHourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHour::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('garage')
                ->setLabel('Garage'),

            FormField::addRow(),
            FormField::addFieldset('Lundi'),
            TimeField::new('monday_open')
                ->setLabel('Ouverture lundi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('monday_close')
                ->setLabel('Fermerture lundi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(),
            FormField::addFieldset('Mardi'),
            TimeField::new('tuesday_open')
                ->setLabel('Ouverture mardi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('tuesday_close')
                ->setLabel('Fermerture mardi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(),
            FormField::addFieldset('Mercredi'),    
            TimeField::new('wednesday_open')
                ->setLabel('Ouverture mercredi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('wednesday_close')
                ->setLabel('Fermerture mercredi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(),
            FormField::addFieldset('Jeudi'),    
            TimeField::new('thursday_open')
                ->setLabel('Ouverture jeudi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('thursday_close')
                ->setLabel('Fermerture jeudi') 
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(), 
            FormField::addFieldset('Vendredi'),   
            TimeField::new('friday_open')
                ->setLabel('Ouverture vendredi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('friday_close')
                ->setLabel('Fermerture vendredi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(),
            FormField::addFieldset('Samedi'),
            TimeField::new('saturday_open')
                ->setLabel('Ouverture samedi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('saturday_close')
                ->setLabel('Fermerture samedi')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),

            FormField::addRow(), 
            FormField::addFieldset('Dimanche'),   
            TimeField::new('sunday_open')
                ->setLabel('Ouverture dimanche')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),
            TimeField::new('sunday_close')
                ->setLabel('Fermerture dimanche')
                ->setColumns('col-12 col-lg-3')
                ->hideOnIndex(),       
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        

        return $actions
            ->disable(Action::DELETE)
            ->disable(Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaire')
            ->setPageTitle('index', 'Horaires')
            ->setPaginatorPageSize(10);
    }

}
