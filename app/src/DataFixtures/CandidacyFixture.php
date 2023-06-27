<?php

namespace App\DataFixtures;

use App\Entity\Candidacy;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CandidacyFixture extends Fixture implements DependentFixtureInterface
{
    public const CANDIDACY_ETU1_OFFER_ENTERPRISE1 = 'candidacy_etu1_offer_enterprise1';
    public function load(ObjectManager $manager)
    {
        $candidacy = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT1))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU1_OFFER_ENTERPRISE1, $candidacy);
        $manager->getRepository(Candidacy::class)->save($candidacy, true);
    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class,
            StudentsFixtures::class
        ];
    }
}