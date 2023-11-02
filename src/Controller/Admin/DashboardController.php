<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\User;
use App\Entity\Option;
use App\Entity\Service;
use App\Entity\CarImage;
use App\Entity\Equipment;
use App\Entity\OpeningHour;
use App\Entity\ServiceCategory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
      return $this->render('admin/dashboard.html.twig');
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration - Garage.V.Parrot')
            ->renderContentMaximized();
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
       
        #Menu Adminstrateur
        yield MenuItem::subMenu('Adminstrateur', 'fa fa-lock')->setSubItems([
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Catégorie de service', 'fa fa-list', ServiceCategory::class),
            MenuItem::linkToCrud('Service', 'fa fa-wrench', Service::class),
            MenuItem::linkToCrud('Horaire d\'ouverture', 'fa fa-clock', OpeningHour::class)
            
        ]);

        #Menu Employé
        yield MenuItem::subMenu('Gestion Parc Voiture', 'fa fa-car')->setSubItems([
            MenuItem::linkToCrud('Voitures', 'fa fa-car', Car::class),
            MenuItem::linkToCrud('Options', 'fa fa-cogs', Option::class),
            MenuItem::linkToCrud('Equipements', 'fa fa-parking', Equipment::class),
            MenuItem::linkToCrud('Images', 'fa fa-image', CarImage::class),
            
        ]) ;

        #return Accueil
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'app_main');
    }
}
