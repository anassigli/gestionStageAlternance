<?php

namespace App\MailService\Candidacies;

use App\Entity\Enterprise;
use App\Entity\Offers;
use App\Entity\Student;
use App\Entity\User;
use App\MailService\MailService;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Part\File;

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

    public function sendAcceptCandidacyMessage(Student $student, Offers $offer, string $content): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($student->getEmail()),
            "Candidature sur l'offre" . $offer->getName(),
            'mails/accept_candidacy.html.twig',
            ['content' => $content]);
    }

    public function sendSpontaneousCandidacyMessage(Student $student, Enterprise $enterprise)
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($student->getEmail()),
            "Candidature spontanée chez" . $enterprise->getName(),
            'mails/spontaneous_candidacy.html.twig',
            ['enterprise' => $enterprise]);
    }

    public function receivedSpontaneousCandidacyMessage(Student    $student,
                                                        Enterprise $enterprise,
                                                        string     $appPath,
                                                        string     $content)
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($enterprise->getEmail()),
            "Candidature spontanée de la part de" . $student->getFirstname() . ' ' . $student->getLastname(),
            'mails/received_spontaneous_candidacy.html.twig',
            [
                'student' => $student,
                'content' => $content
            ],
            $appPath . "\public\images\students\\" . $student->getCv());
    }

    public function sendCandidacyMessage(Enterprise $enterprise, Offers $offer, string $content): void
    {
        $this->sendTemplatedEmail(new Address(parent::EMAIL_APPLICATION, 'Appli Stage'),
            new Address($enterprise->getEmail()),
            "Candidature sur l'offre" . $offer->getName(),
            'mails/send_candidacy.html.twig',
            ['content' => $content]);
    }
}