<?php

namespace App\Controller;


use App\Entity\Testimony;
use App\Service\GarageId;
use App\Form\Type\TestimonyType;
use App\Repository\GarageRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ServiceCategoryRepository;
use App\Repository\TestimonyRepository;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    private $garageId;
    private $garageRepository;

    public function __construct(GarageId $garageIdService ,GarageRepository $garageRepository)
    {
        $this->garageId = $garageIdService->getGarageId();
        $this->garageRepository = $garageRepository;
    }


    #[Route('/', name: 'app_main')]
    public function index(ServiceCategoryRepository $serviceCategoryRepository, TestimonyRepository $testimonyRepository,CarRepository $carRepository, Request $requset, EntityManagerInterface $em): Response
    {
        
        // Get garage id
        $garage = $this->garageRepository->find($this->garageId);
        
        // Categories for view
        $categories = $serviceCategoryRepository->findBy(['garage' => $garage]);
        // Testimony for view
        $testimonies = $testimonyRepository->findBy(['is_moderated' => true, 'garage' => $garage]);
        //Car for view
        $cars = $carRepository->findAll();

        // Testimony form
        $testimony = new Testimony();
        $testimonyForm = $this->createForm(TestimonyType::class, $testimony);

        $testimonyForm->handleRequest($requset);

        if($testimonyForm->isSubmitted() && $testimonyForm->isValid()) {


            $testimonyForm->getData();
            $testimonyForm->getData()->setGarage($garage);
            $em->persist($testimonyForm->getData());
            $em->flush();
            $this->addFlash('success', 'Votre témoignage a bien été envoyé, il sera publié après modération');
            return $this->redirectToRoute('app_main');
        } else if($testimonyForm->isSubmitted() && !$testimonyForm->isValid()) {
            $this->addFlash('error', 'Votre témoignage n\'a pas pu être envoyé, veuillez vérifier les informations saisies');
            return $this->redirectToRoute('app_main');
        }

        return $this->render('main/index.html.twig', [
            'categories' => $categories,
            'testimonyForm' => $testimonyForm->createView(),
            'testimonies' => $testimonies,
            'cars' => $cars
        ]);
    }
}
