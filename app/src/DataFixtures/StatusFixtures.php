<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture {
    public const WAITING = 'status wait';
    public const VERIFIED = 'status verified';
    public const REFUSED = 'status refused';
    public const FILLED = 'status filled';

    public function load(ObjectManager $manager)
    {
        $verifiedStatus = (new Status())
            ->setStatus("Validée");
        $waitingStatus = (new Status())
            ->setStatus("En attente");
        $refusedStatus = (new Status())
            ->setStatus("Refusée");
        $filledStatus = (new Status())
            ->setStatus("Pourvue");

        $this->addReference(self::VERIFIED, $verifiedStatus);
        $this->addReference(self::WAITING, $waitingStatus);
        $this->addReference(self::REFUSED, $refusedStatus);
        $this->addReference(self::FILLED, $filledStatus);

        $manager->getRepository(Status::class)->save($verifiedStatus, true);
        $manager->getRepository(Status::class)->save($waitingStatus, true);
        $manager->getRepository(Status::class)->save($refusedStatus, true);
        $manager->getRepository(Status::class)->save($filledStatus, true);
    }
}