<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class EmailService
{
    private $mailer;
    
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function contactEmail( $lastname, $firstname, $phoneNumber, $email, $subject, $message)
    {
        $emailSend = (new Email())
             ->from($_ENV['MAIL_FROM_ADDRESS'])
             ->to($_ENV['MAIL_TO_ADDRESS'])
             ->subject($subject)
             ->text("Message de : " . $lastname . " " . $firstname . "\n" . "Téléphone : " . $phoneNumber ."\n" . "Email : " . $email."\n". "Message : " . $message);

        $this->mailer->send($emailSend);

    }
}