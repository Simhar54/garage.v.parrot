<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Option;
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
            
        ]);

        #Menu Employé
        yield MenuItem::subMenu('Employé', 'fa fa-user')->setSubItems([
            MenuItem::linkToCrud('Options', 'fa fa-cogs', Option::class),
            
        ]) ;

        #return Accueil
        yield MenuItem::linkToRoute('Accueil', 'fa fa-home', 'app_main');
    }
}
