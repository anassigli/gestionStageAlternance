<?php

namespace App\MailService\VerifyUser;

use App\Entity\User;
use App\MailService\MailService;
use Symfony\Component\Mime\Address;

class Mailer extends MailService
{
    public function sendConfirmEmailMessage(User $user, string $signedUrl): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($user->getEmail()),
            "Confirmation de votre email",
            'mails/confirmation_email.html.twig',
            ['signedUrl' => $signedUrl]);
    }
}