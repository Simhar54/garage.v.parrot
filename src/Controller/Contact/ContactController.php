<?php

namespace App\Controller\Contact;

use App\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {

          $form = $this->createForm(ContactType::class);  
        $form->handleRequest($request);

        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }
}
