<?php

namespace App\Controller\Admin;

use App\Entity\CarImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarImage::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Option')
            ->setPageTitle('index', 'Options')
            ->setPaginatorPageSize(10);
    }
}
