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


        $candidacy3 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT1))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU1_OFFER1_ENTERPRISE2, $candidacy3);
        $manager->getRepository(Candidacy::class)->save($candidacy3, true);

        $candidacy4 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT2))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU2_OFFER1_ENTERPRISE1, $candidacy4);
        $manager->getRepository(Candidacy::class)->save($candidacy4, true);


        $candidacy6 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT3))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU3_OFFER1_ENTERPRISE1, $candidacy6);
        $manager->getRepository(Candidacy::class)->save($candidacy6, true);

        $candidacy9 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT5))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU5_OFFER1_ENTERPRISE1, $candidacy9);
        $manager->getRepository(Candidacy::class)->save($candidacy9, true);

        $candidacy10 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT6))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU6_OFFER1_ENTERPRISE2, $candidacy10);
        $manager->getRepository(Candidacy::class)->save($candidacy10, true);

        $candidacy12 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT7))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU7_OFFER2_ENTERPRISE3, $candidacy12);
        $manager->getRepository(Candidacy::class)->save($candidacy12, true);


        $candidacy14 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT9))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU9_OFFER1_ENTERPRISE1, $candidacy14);
        $manager->getRepository(Candidacy::class)->save($candidacy14, true);


        $candidacy17 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT10))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU10_OFFER1_ENTERPRISE1, $candidacy17);
        $manager->getRepository(Candidacy::class)->save($candidacy17, true);

        $candidacy18 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::REFUSED));
        $this->addReference(self::CANDIDACY_ETU11_OFFER1_ENTERPRISE3, $candidacy18);
        $manager->getRepository(Candidacy::class)->save($candidacy18, true);

        $candidacy19 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU11_OFFER2_ENTERPRISE3, $candidacy19);
        $manager->getRepository(Candidacy::class)->save($candidacy19, true);

        $candidacy20 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT12))
            ->setStatus($this->getReference(StatusFixtures::REFUSED));
        $this->addReference(self::CANDIDACY_ETU12_OFFER1_ENTERPRISE4, $candidacy20);
        $manager->getRepository(Candidacy::class)->save($candidacy20, true);

        $candidacy21 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT13))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU13_OFFER3_ENTERPRISE1, $candidacy21);
        $manager->getRepository(Candidacy::class)->save($candidacy21, true);

        $candidacy24 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT16))
            ->setStatus($this->getReference(StatusFixtures::WAITING));
        $this->addReference(self::CANDIDACY_ETU16_OFFER1_ENTERPRISE4, $candidacy24);
        $manager->getRepository(Candidacy::class)->save($candidacy24, true);

    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class,
            StudentsFixtures::class
        ];
    }
}