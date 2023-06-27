<?php

namespace App\MailService;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailService
{
    private MailerInterface $mailer;
    protected const EMAIL_APPLICATION = 'appli-stage@gmail.com';

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    protected function sendTemplatedEmail(Address $from, Address $to, string $subject, string $template, array $context = []): void
    {
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);

        $this->mailer->send($email);
    }
}