<?php

namespace App\MailService\VerifyUser;

use App\Entity\Enterprise;
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

    public function sendAcceptEnterpriseMessage(Enterprise $enterprise)
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address(parent::EMAIL_ADMIN),
            "Création d'un nouvelle entreprise",
            'mails/accept_enterprise.html.twig',
            ['enterprise' => $enterprise]);
    }
}