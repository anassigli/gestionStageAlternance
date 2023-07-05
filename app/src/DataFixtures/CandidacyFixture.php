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
    public const CANDIDACY_ETU6_OFFER2_ENTERPRISE2 = 'candidacy_etu6_offer2_enterprise2';
    public const CANDIDACY_ETU7_OFFER2_ENTERPRISE3 = 'candidacy_etu7_offer2_enterprise3';
    public const CANDIDACY_ETU9_OFFER1_ENTERPRISE1 = 'candidacy_etu9_offer1_enterprise1';
    public const CANDIDACY_ETU10_OFFER1_ENTERPRISE2 = 'candidacy_etu10_offer1_enterprise2';
    public const CANDIDACY_ETU10_OFFER2_ENTERPRISE2 = 'candidacy_etu10_offer2_enterprise2';
    public const CANDIDACY_ETU10_OFFER1_ENTERPRISE1 = 'candidacy_etu10_offer1_enterprise1';
    public const CANDIDACY_ETU11_OFFER1_ENTERPRISE3 = 'candidacy_etu11_offer1_enterprise3';
    public const CANDIDACY_ETU11_OFFER2_ENTERPRISE3 = 'candidacy_etu11_offer2_enterprise3';
    public const CANDIDACY_ETU12_OFFER1_ENTERPRISE4 = 'candidacy_etu12_offer1_enterprise4';
    public const CANDIDACY_ETU13_OFFER3_ENTERPRISE1 = 'candidacy_etu13_offer3_enterprise1';
    public const CANDIDACY_ETU14_OFFER2_ENTERPRISE1 = 'candidacy_etu14_offer2_enterprise1';
    public const CANDIDACY_ETU15_OFFER2_ENTERPRISE2 = 'candidacy_etu15_offer2_enterprise2';

    public function load(ObjectManager $manager)
    {
        $candidacy1 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT1))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-26 19:31:21'));
        $this->addReference(self::CANDIDACY_ETU1_OFFER1_ENTERPRISE1, $candidacy1);
        $manager->getRepository(Candidacy::class)->save($candidacy1, true);


        $candidacy4 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT2))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-26 19:40:17'));
        $this->addReference(self::CANDIDACY_ETU2_OFFER1_ENTERPRISE1, $candidacy4);
        $manager->getRepository(Candidacy::class)->save($candidacy4, true);

        $candidacy3 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT1))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-26 19:50:39'));
        $this->addReference(self::CANDIDACY_ETU1_OFFER1_ENTERPRISE2, $candidacy3);
        $manager->getRepository(Candidacy::class)->save($candidacy3, true);

        $candidacy6 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT3))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-28 19:12:51'));
        $this->addReference(self::CANDIDACY_ETU3_OFFER1_ENTERPRISE1, $candidacy6);
        $manager->getRepository(Candidacy::class)->save($candidacy6, true);

        $candidacy9 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT5))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-29 22:26:43'));
        $this->addReference(self::CANDIDACY_ETU5_OFFER1_ENTERPRISE1, $candidacy9);
        $manager->getRepository(Candidacy::class)->save($candidacy9, true);

        $candidacy10 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT6))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-29 23:54:47'));
        $this->addReference(self::CANDIDACY_ETU6_OFFER1_ENTERPRISE2, $candidacy10);
        $manager->getRepository(Candidacy::class)->save($candidacy10, true);

        $candidacy11 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT6))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-02-04 19:23:42'));
        $this->addReference(self::CANDIDACY_ETU6_OFFER2_ENTERPRISE2, $candidacy11);
        $manager->getRepository(Candidacy::class)->save($candidacy11, true);

        $candidacy12 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT7))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-04 18:11:05'));
        $this->addReference(self::CANDIDACY_ETU7_OFFER2_ENTERPRISE3, $candidacy12);
        $manager->getRepository(Candidacy::class)->save($candidacy12, true);

        $candidacy14 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT9))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-04 21:06:02'));
        $this->addReference(self::CANDIDACY_ETU9_OFFER1_ENTERPRISE1, $candidacy14);
        $manager->getRepository(Candidacy::class)->save($candidacy14, true);

        $candidacy15 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT10))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-06 09:12:54'));
        $this->addReference(self::CANDIDACY_ETU10_OFFER1_ENTERPRISE2, $candidacy15);
        $manager->getRepository(Candidacy::class)->save($candidacy15, true);

        $candidacy16 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT10))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-08 15:26:49'));
        $this->addReference(self::CANDIDACY_ETU10_OFFER2_ENTERPRISE2, $candidacy16);
        $manager->getRepository(Candidacy::class)->save($candidacy16, true);

        $candidacy17 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT10))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-08 19:14:52'));
        $this->addReference(self::CANDIDACY_ETU10_OFFER1_ENTERPRISE1, $candidacy17);
        $manager->getRepository(Candidacy::class)->save($candidacy17, true);

        $candidacy18 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2023-03-24 23:15:22'));
        $this->addReference(self::CANDIDACY_ETU11_OFFER1_ENTERPRISE3, $candidacy18);
        $manager->getRepository(Candidacy::class)->save($candidacy18, true);

        $candidacy19 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-01 07:55:05'));
        $this->addReference(self::CANDIDACY_ETU11_OFFER2_ENTERPRISE3, $candidacy19);
        $manager->getRepository(Candidacy::class)->save($candidacy19, true);

        $candidacy20 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT12))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-01 18:27:51'));
        $this->addReference(self::CANDIDACY_ETU12_OFFER1_ENTERPRISE4, $candidacy20);
        $manager->getRepository(Candidacy::class)->save($candidacy20, true);

        $candidacy21 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT13))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-01 19:45:02'));
        $this->addReference(self::CANDIDACY_ETU13_OFFER3_ENTERPRISE1, $candidacy21);
        $manager->getRepository(Candidacy::class)->save($candidacy21, true);

        $candidacy22 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT14))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-02 13:25:41'));
        $this->addReference(self::CANDIDACY_ETU14_OFFER2_ENTERPRISE1, $candidacy22);
        $manager->getRepository(Candidacy::class)->save($candidacy22, true);

        $candidacy23 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT15))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-02 15:00:20'));
        $this->addReference(self::CANDIDACY_ETU15_OFFER2_ENTERPRISE2, $candidacy23);
        $manager->getRepository(Candidacy::class)->save($candidacy23, true);

        $candidacy24 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT16))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2023-04-02 19:04:50'));
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