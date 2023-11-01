<?php

namespace App\Controller\Contact;

use App\Form\Type\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{ 
    private $mailer;  
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
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
                $this->sendEmail($lastname, $firstname, $phoneNumber, $email, $subject, $message);
                $this->addFlash('success', 'Votre message a bien été envoyé!!');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
            }

        } else {
            $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
        }
        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }

    private function sendEmail( $lastname, $firstname, $phoneNumber, $email, $subject, $message)
    {
        $emailSend = (new Email())
            ->from("form_contact@garage.v.parrot.simar-digital.com")
            ->to("contact@garage.v.parrot.simar-digital.com")
            ->subject($subject)
            ->text("Message de : " . $lastname . " " . $firstname . "\n" . "Téléphone : " . $phoneNumber ."\n" . "Message : " . $message);

        $this->mailer->send($emailSend);

    }

    #[Route('/send-test-email', name: 'send_test_email')]
    public function sendTestEmail(): Response
    {
        try {
            $email = (new Email())
                ->from('noreply@mondomaine.com')
                ->to('destinataire@exemple.com')
                ->subject('Email de Test')
                ->text('Ceci est un email de test.');

            $this->mailer->send($email);

            return new Response('Email de test envoyé avec succès');
        } catch (\Exception $e) {
            return new Response('Échec de l\'envoi de l\'email de test : ' . $e->getMessage());
        }
    }
}

