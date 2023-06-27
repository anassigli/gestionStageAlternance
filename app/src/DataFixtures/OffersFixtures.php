<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OffersFixtures extends Fixture implements DependentFixtureInterface
{
    public const OFFER_ENTERPRISE1_1 = 'offer_enterprise1_1';
    public const OFFER_ENTERPRISE1_2 = 'offer_enterprise1_2';
    public const OFFER_ENTERPRISE1_3 = 'offer_enterprise1_3';
    public const OFFER_ENTERPRISE1_4 = 'offer_enterprise1_4';

    public const OFFER_ENTERPRISE2_1 = 'offer_enterprise2_1';
    public const OFFER_ENTERPRISE2_2 = 'offer_enterprise2_2';

    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 5; $i++) {
            $offer = (new Offers())
                ->setName("Offre d'alternance de développeur FullStack " . $i)
                ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
                ->setDepartment("33000")
                ->setCity("Bordeaux")
                ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
                ->setStatus($this->getReference(StatusFixtures::VERIFIED));

            switch ($i){
                case 2:
                    $this->addReference(self::OFFER_ENTERPRISE1_2, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE1_2, $offer);
                    break;
                case 3:
                    $this->addReference(self::OFFER_ENTERPRISE1_3, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE1_3, $offer);
                    break;
                case 4:
                    $this->addReference(self::OFFER_ENTERPRISE1_4, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE1_4, $offer);
                    break;
                default:
                    $this->addReference(self::OFFER_ENTERPRISE1_1, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE1_1, $offer);
                    break;
            }
            $manager->getRepository(Offers::class)->save($offer, true);
        }
        for($i = 1; $i < 3; $i++) {
            $offer = (new Offers())
                ->setName("Offre d'alternance de développeur FullStack " . $i)
                ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
                ->setDepartment("33160")
                ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
                ->setCity("Cestas")
                ->setStatus($this->getReference(StatusFixtures::VERIFIED));

            switch ($i){
                case 2:
                    $this->addReference(self::OFFER_ENTERPRISE2_2, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE2_2, $offer);
                    break;
                default:
                    $this->addReference(self::OFFER_ENTERPRISE2_1, $offer);
                    $this->setReference(self::OFFER_ENTERPRISE2_1, $offer);
                    break;
            }
            $manager->getRepository(Offers::class)->save($offer, true);
        }
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            EnterpriseFixtures::class
        ];
    }
}