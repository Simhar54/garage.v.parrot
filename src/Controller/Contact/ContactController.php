<?php

namespace App\Controller\Contact;

use App\Form\Type\ContactType;
use App\Service\EmailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{ 
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {

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
                return $this->redirectToRoute('app_contact');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
                return $this->redirectToRoute('app_contact');
            }
        } 
        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }

    

}

