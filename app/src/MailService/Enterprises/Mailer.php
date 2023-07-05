<?php

namespace App\MailService\Enterprises;

use App\Entity\Enterprise;
use App\Entity\User;
use App\MailService\MailService;
use Symfony\Component\Mime\Address;

class Mailer extends MailService
{
    public function sendAcceptEnterpriseMessage(Enterprise $enterprise)
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address(parent::EMAIL_ADMIN),
            "Création d'un nouvelle entreprise",
            'mails/accept_enterprise.html.twig',
            ['enterprise' => $enterprise]);
    }

    public function sendChangeStatusEnterpriseMessage(Enterprise $enterprise)
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($enterprise->getEmail()),
            "Changement de statut de votre entreprise",
            'mails/change_status_enterprise.html.twig',
            [
                'enterprise' => $enterprise,
                'mail_admin' => parent::EMAIL_ADMIN,
            ]);
    }
}