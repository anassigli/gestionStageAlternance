<?php

namespace App\MailService\Candidacies;

use App\Entity\Offers;
use App\Entity\Student;
use App\Entity\User;
use App\MailService\MailService;
use Symfony\Component\Mime\Address;

class Mailer extends MailService
{
    public function sendPostedCandidacyMessage(User $user, Offers $offer): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($user->getEmail()),
            "Candidature sur l'offre" . $offer->getName(),
            'mails/posted_candidacy.html.twig',
            ['offer' => $offer]);
    }

    public function sendDenyCandidacyMessage(Student $student, Offers $offer): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($student->getEmail()),
            "Candidature sur l'offre" . $offer->getName(),
            'mails/deny_candidacy.html.twig',
            ['offer' => $offer]);
    }

    public function sendAcceptCandidacyMessage(Student $student, Offers $offer): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($student->getEmail()),
            "Candidature sur l'offre" . $offer->getName(),
            'mails/accept_candidacy.html.twig',
            ['offer' => $offer]);
    }
}