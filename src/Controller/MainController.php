<?php

namespace App\Controller;

use App\Repository\ServiceCategoryRepository as RepositoryServiceCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(RepositoryServiceCategoryRepository $serviceCategoryRepository): Response
    {
        $categories = $serviceCategoryRepository->findAll();

        return $this->render('main/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
