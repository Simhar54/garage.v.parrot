<?php

namespace App\Controller\Car;

use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


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

    #[Route('/api/cars/filter', name: 'api_car_filter', methods: ['GET'])]
    public function getCarsByFilter (CarRepository $carRepository ,Request $request): Response
    {
            
            $yearMin = $request->query->get('yearMin');
            $yearMax = $request->query->get('yearMax');
            $kmMin = $request->query->get('kmMin');
            $kmMax = $request->query->get('kmMax');
            $priceMin = $request->query->get('priceMin');
            $priceMax = $request->query->get('priceMax');

            $cars = $carRepository->findByFilter($priceMin, $priceMax, $kmMin, $kmMax, $yearMin, $yearMax );

            
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
