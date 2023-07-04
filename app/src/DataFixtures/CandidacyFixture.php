<?php

namespace App\DataFixtures;

use App\Entity\Candidacy;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CandidacyFixture extends Fixture implements DependentFixtureInterface
{
    public const CANDIDACY_ETU1_OFFER1_ENTERPRISE1 = 'candidacy_etu1_offer1_enterprise1';
    public const CANDIDACY_ETU1_OFFER1_ENTERPRISE2 = 'candidacy_etu1_offer1_enterprise2';
    public const CANDIDACY_ETU2_OFFER1_ENTERPRISE1 = 'candidacy_etu2_offer1_enterprise1';
    public const CANDIDACY_ETU3_OFFER1_ENTERPRISE1 = 'candidacy_etu3_offer1_enterprise1';
    public const CANDIDACY_ETU5_OFFER1_ENTERPRISE1 = 'candidacy_etu5_offer1_enterprise1';
    public const CANDIDACY_ETU6_OFFER1_ENTERPRISE2 = 'candidacy_etu6_offer1_enterprise2';
    public const CANDIDACY_ETU7_OFFER2_ENTERPRISE3 = 'candidacy_etu7_offer2_enterprise3';
    public const CANDIDACY_ETU9_OFFER1_ENTERPRISE1 = 'candidacy_etu9_offer1_enterprise1';
    public const CANDIDACY_ETU10_OFFER1_ENTERPRISE1 = 'candidacy_etu10_offer1_enterprise1';
    public const CANDIDACY_ETU11_OFFER1_ENTERPRISE3 = 'candidacy_etu11_offer1_enterprise3';
    public const CANDIDACY_ETU11_OFFER2_ENTERPRISE3 = 'candidacy_etu11_offer2_enterprise3';
    public const CANDIDACY_ETU12_OFFER1_ENTERPRISE4 = 'candidacy_etu12_offer1_enterprise4';
    public const CANDIDACY_ETU13_OFFER3_ENTERPRISE1 = 'candidacy_etu13_offer3_enterprise1';
    public const CANDIDACY_ETU16_OFFER1_ENTERPRISE4 = 'candidacy_etu16_offer1_enterprise4';

    public function load(ObjectManager $manager)
    {
        $candidacy1 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::CANDIDACY_ETU1_OFFER1_ENTERPRISE1, $candidacy1);
        $manager->getRepository(Candidacy::class)->save($candidacy1, true);


    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class,
            StudentsFixtures::class
        ];
    }
}