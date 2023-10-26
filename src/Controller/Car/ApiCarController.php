<?php

namespace App\Controller\Car;

use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiCarController extends AbstractController
{
    #[Route('/api/cars', name: 'api_cars')]
    public function getCars(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();

        $data = array();
        foreach ($cars as $car) {
            $data[] = 
                ['id' => $car->getId(),
                'brand' => $car->getBrand(),
                'model' => $car->getModel(),
                'price' => $car->getPrice(),
                'year' => $car->getYear(),
                'mileage' => $car->getMileage(),
                'image' => $car->getCarImages()[0]->getImagePath(),];
        }
        return new JsonResponse($data);
    }

}
