<?php

namespace App\DataFixtures;

use App\Entity\Candidacy;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CandidacyFixture extends Fixture implements DependentFixtureInterface
{
    public const CANDIDACY_ETU2_OFFER2_ENTERPRISE1 = 'candidacy_etu2_offer2_enterprise1';
    public const CANDIDACY_ETU3_OFFER1_ENTERPRISE2 = 'candidacy_etu3_offer1_enterprise2';
    public const CANDIDACY_ETU4_OFFER1_ENTERPRISE2 = 'candidacy_etu4_offer1_enterprise2';
    public const CANDIDACY_ETU3_OFFER2_ENTERPRISE2 = 'candidacy_etu3_offer2_enterprise2';
    public const CANDIDACY_ETU5_OFFER3_ENTERPRISE1 = 'candidacy_etu5_offer3_enterprise1';
    public const CANDIDACY_ETU6_OFFER2_ENTERPRISE3 = 'candidacy_etu6_offer2_enterprise3';
    public const CANDIDACY_ETU7_OFFER2_ENTERPRISE3 = 'candidacy_etu7_offer2_enterprise3';
    public const CANDIDACY_ETU6_OFFER1_ENTERPRISE4 = 'candidacy_etu6_offer1_enterprise4';
    public const CANDIDACY_ETU8_OFFER2_ENTERPRISE4 = 'candidacy_etu8_offer2_enterprise4';
    public const CANDIDACY_ETU9_OFFER1_ENTERPRISE5 = 'candidacy_etu9_offer1_enterprise5';
    public const CANDIDACY_ETU10_OFFER2_ENTERPRISE5 = 'candidacy_etu10_offer2_enterprise5';
    public const CANDIDACY_ETU11_OFFER1_ENTERPRISE6 = 'candidacy_etu11_offer1_enterprise6';
    public const CANDIDACY_ETU12_OFFER1_ENTERPRISE6 = 'candidacy_etu12_offer1_enterprise6';
    public const CANDIDACY_ETU11_OFFER2_ENTERPRISE6 = 'candidacy_etu11_offer2_enterprise6';
    public const CANDIDACY_ETU13_OFFER1_ENTERPRISE7 = 'candidacy_etu13_offer1_enterprise7';
    public const CANDIDACY_ETU14_OFFER2_ENTERPRISE7 = 'candidacy_etu14_offer2_enterprise7';
    public const CANDIDACY_ETU14_OFFER2_ENTERPRISE8 = 'candidacy_etu14_offer2_enterprise8';
    public const CANDIDACY_ETU15_OFFER1_ENTERPRISE1 = 'candidacy_etu15_offer1_enterprise1';
    public const CANDIDACY_ETU16_OFFER1_ENTERPRISE1 = 'candidacy_etu16_offer1_enterprise1';
    public function load(ObjectManager $manager)
    {

        $candidacy1 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-15 19:40:17'));
        $this->addReference(self::CANDIDACY_ETU2_OFFER2_ENTERPRISE1, $candidacy1);
        $manager->getRepository(Candidacy::class)->save($candidacy1, true);

        $candidacy2 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT3))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-11 13:23:41'));
        $this->addReference(self::CANDIDACY_ETU3_OFFER1_ENTERPRISE2, $candidacy2);
        $manager->getRepository(Candidacy::class)->save($candidacy2, true);

        $candidacy3 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT4))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-13 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU4_OFFER1_ENTERPRISE2, $candidacy3);
        $manager->getRepository(Candidacy::class)->save($candidacy3, true);

        $candidacy4 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-17 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU3_OFFER2_ENTERPRISE2, $candidacy3);
        $manager->getRepository(Candidacy::class)->save($candidacy4, true);

        $candidacy5 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT5))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-21 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU5_OFFER3_ENTERPRISE1, $candidacy5);
        $manager->getRepository(Candidacy::class)->save($candidacy5, true);

        $candidacy6 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT6))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-10-05 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU6_OFFER2_ENTERPRISE3, $candidacy6);
        $manager->getRepository(Candidacy::class)->save($candidacy6, true);

        $candidacy7 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT7))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-10-07 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU7_OFFER2_ENTERPRISE3, $candidacy7);
        $manager->getRepository(Candidacy::class)->save($candidacy7, true);

        $candidacy8 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT6))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-26 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU6_OFFER1_ENTERPRISE4, $candidacy8);
        $manager->getRepository(Candidacy::class)->save($candidacy8, true);

        $candidacy9 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT8))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-24 14:16:23'));
        $this->addReference(self::CANDIDACY_ETU8_OFFER2_ENTERPRISE4, $candidacy9);
        $manager->getRepository(Candidacy::class)->save($candidacy9, true);


        $candidacy10 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT9))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-02-18 09:11:23'));
        $this->addReference(self::CANDIDACY_ETU9_OFFER1_ENTERPRISE5, $candidacy10);
        $manager->getRepository(Candidacy::class)->save($candidacy10, true);

        $candidacy11 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT10))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-02-24 09:11:23'));
        $this->addReference(self::CANDIDACY_ETU10_OFFER2_ENTERPRISE5, $candidacy11);
        $manager->getRepository(Candidacy::class)->save($candidacy11, true);

        $candidacy12 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-04-15 15:57:23'));
        $this->addReference(self::CANDIDACY_ETU11_OFFER1_ENTERPRISE6, $candidacy12);
        $manager->getRepository(Candidacy::class)->save($candidacy12, true);

        $candidacy13 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT12))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-04-18 08:02:43'));
        $this->addReference(self::CANDIDACY_ETU12_OFFER1_ENTERPRISE6, $candidacy13);
        $manager->getRepository(Candidacy::class)->save($candidacy13, true);

        $candidacy14 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT11))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-04-29 19:38:43'));
        $this->addReference(self::CANDIDACY_ETU11_OFFER2_ENTERPRISE6, $candidacy14);
        $manager->getRepository(Candidacy::class)->save($candidacy14, true);


        $candidacy15 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE7_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT13))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-06-29 17:40:43'));
        $this->addReference(self::CANDIDACY_ETU13_OFFER1_ENTERPRISE7, $candidacy15);
        $manager->getRepository(Candidacy::class)->save($candidacy15, true);


        $candidacy15 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE7_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT14))
            ->setStatus($this->getReference(StatusFixtures::REFUSED))
            ->setCreatedAt(new \DateTimeImmutable('2022-06-30 23:40:43'));
        $this->addReference(self::CANDIDACY_ETU14_OFFER2_ENTERPRISE7, $candidacy15);
        $manager->getRepository(Candidacy::class)->save($candidacy15, true);


        $candidacy16 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE8_2))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT14))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED))
            ->setCreatedAt(new \DateTimeImmutable('2022-07-06 11:40:43'));
        $this->addReference(self::CANDIDACY_ETU14_OFFER2_ENTERPRISE8, $candidacy16);
        $manager->getRepository(Candidacy::class)->save($candidacy16, true);

        $candidacy17 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT15))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2022-07-05 16:36:43'));
        $this->addReference(self::CANDIDACY_ETU15_OFFER1_ENTERPRISE1, $candidacy17);
        $manager->getRepository(Candidacy::class)->save($candidacy17, true);

        $candidacy18 = (new Candidacy())
            ->setOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1))
            ->setStudent($this->getReference(StudentsFixtures::STUDENT16))
            ->setStatus($this->getReference(StatusFixtures::WAITING))
            ->setCreatedAt(new \DateTimeImmutable('2022-07-06 20:36:43'));
        $this->addReference(self::CANDIDACY_ETU16_OFFER1_ENTERPRISE1, $candidacy18);
        $manager->getRepository(Candidacy::class)->save($candidacy18, true);

    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class,
            StudentsFixtures::class
        ];
    }
}