<?php

namespace App\Controller\Car;

use App\Service\EmailService;
use App\Form\Type\ContactType;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarDetailController extends AbstractController
{

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    #[Route('/car/car_detail/{id}', name: 'app_car_detail')]
    public function index(int $id, CarRepository $carRepository,Request $request): Response
    {
        $car = $carRepository->find($id);


        if (!$car) {
            throw $this->createNotFoundException(
                "Cette voiture n'existe pas"
            );
        }

        $form = $this->createForm(ContactType::class);  
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $lastname = $contactFormData['lastname'];
            $firstname = $contactFormData['firstname'];
            $phoneNumber = $contactFormData['phoneNumber'];
            $email = $contactFormData['email'];
            $subject = $contactFormData['subject'];
            $message = $contactFormData['message'];

            try {
                $this->emailService->contactEmail($lastname, $firstname, $phoneNumber, $email, $subject, $message);
                $this->addFlash('success', 'Votre message a bien été envoyé!!');
                return $this->redirectToRoute('app_car_detail', ['id' => $id]);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
            }
        } 

      
        return $this->render('car/car_detail.html.twig', [
            'car' => $car,
            'formContact' => $form->createView(),
        ]);
    }
}
