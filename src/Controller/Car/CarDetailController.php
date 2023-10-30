<?php

namespace App\Controller\Car;

use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarDetailController extends AbstractController
{
    #[Route('/car/car_detail/{id}', name: 'app_car_detail')]
    public function index(int $id,CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException(
                "Cette voiture n'existe pas"
            );
        }
      
        return $this->render('car/car_detail.html.twig', [
            'car' => $car,
        ]);
    }
}
