<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class CarCrudController extends AbstractCrudController
{
    private $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }


    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions

        ->add(Crud::PAGE_INDEX, Action::DETAIL);
}


    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('brand')
                ->setLabel('Marque')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextField::new('model')
                ->setLabel('Modèle')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            IntegerField::new('price')
                ->setLabel('Prix')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            IntegerField::new('year')
                ->setLabel('Année')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            IntegerField::new('mileage')
                ->setLabel('Kilométrage')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]), 
            DateField::new('created_at')
                ->setLabel('Date de création')
                ->onlyOnDetail(), 
            DateField::new('updated_at')
                ->setLabel('Date de modification')
                ->onlyOnDetail(),
            AssociationField::new('employee')
                ->setLabel('Employé')
                ->onlyOnDetail(),
            AssociationField::new('options')
                ->setLabel('Options')
                ->onlyOnForms(),
            CollectionField::new('options')
                ->setLabel('Options')
                ->onlyOnDetail(),
            AssociationField::new('equipments')
                ->setLabel('Equipements')
                ->onlyOnForms(),
            CollectionField::new('equipments')
                ->setLabel('Equipements')
                ->onlyOnDetail(),
            
        ];
    }

    // Get User ID and set it to the employee_id field
    public function createEntity(string $entityFqcn)
    {
        $car = new Car();
        $user = $this->security->getUser();
        $car->setEmployee($user);
        return $car;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Voiture')
            ->setPageTitle('index', 'Voitures')
            ->setPaginatorPageSize(10);
    }

}
