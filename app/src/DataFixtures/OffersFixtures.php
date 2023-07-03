<?php

namespace App\DataFixtures;

use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OffersFixtures extends Fixture implements DependentFixtureInterface
{
    public const OFFER_ENTERPRISE1_1 = 'offer_enterprise1_1';
    public const OFFER_ENTERPRISE1_2 = 'offer_enterprise1_2';
    public const OFFER_ENTERPRISE1_3 = 'offer_enterprise1_3';
    public const OFFER_ENTERPRISE2_1 = 'offer_enterprise2_1';
    public const OFFER_ENTERPRISE2_2 = 'offer_enterprise2_2';
    public const OFFER_ENTERPRISE3_1 = 'offer_enterprise3_1';
    public const OFFER_ENTERPRISE3_2 = 'offer_enterprise3_2';
    public const OFFER_ENTERPRISE4_1 = 'offer_enterprise4_1';
    public const OFFER_ENTERPRISE4_2 = 'offer_enterprise4_2';

    public function load(ObjectManager $manager)
    {
        $offer1_1 = (new Offers())
            ->setName("Alternance Développeur JAVA H/F")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_2 = (new Offers())
            ->setName("Stage Développeur JAVA/Angular H/F" )
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33160")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::WAITING));

        $offer1_3 = (new Offers())
            ->setName("Alternance - Developer Web H/F")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_1 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_2 = (new Offers())
            ->setName("Stage Maintenance de base de données" )
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33160")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::WAITING));

        $offer3_1 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_2 = (new Offers())
            ->setName("Développeur C# H/F" )
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer4_1 = (new Offers())
            ->setName("Alternance - Développeur Kotlin H/F")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE4))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer4_2 = (new Offers())
            ->setName("Alternance - Développeur Angular H/F" )
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE4))
            ->setStatus($this->getReference(StatusFixtures::WAITING));


        $this->addReference(self::OFFER_ENTERPRISE1_1, $offer1_1);
        $this->setReference(self::OFFER_ENTERPRISE1_1, $offer1_1);

        $this->addReference(self::OFFER_ENTERPRISE1_2, $offer1_2);
        $this->setReference(self::OFFER_ENTERPRISE1_2, $offer1_2);

        $this->addReference(self::OFFER_ENTERPRISE1_3, $offer1_3);
        $this->setReference(self::OFFER_ENTERPRISE1_3, $offer1_3);

        $this->addReference(self::OFFER_ENTERPRISE2_1, $offer2_1);
        $this->setReference(self::OFFER_ENTERPRISE2_1, $offer2_1);

        $this->addReference(self::OFFER_ENTERPRISE2_2, $offer2_2);
        $this->setReference(self::OFFER_ENTERPRISE2_2, $offer2_2);

        $this->addReference(self::OFFER_ENTERPRISE3_1, $offer3_1);
        $this->setReference(self::OFFER_ENTERPRISE3_1, $offer3_1);

        $this->addReference(self::OFFER_ENTERPRISE3_2, $offer3_2);
        $this->setReference(self::OFFER_ENTERPRISE3_2, $offer3_2);

        $this->addReference(self::OFFER_ENTERPRISE4_1, $offer4_1);
        $this->setReference(self::OFFER_ENTERPRISE4_1, $offer4_1);

        $this->addReference(self::OFFER_ENTERPRISE4_2, $offer4_2);
        $this->setReference(self::OFFER_ENTERPRISE4_2, $offer4_2);

        $manager->getRepository(Offers::class)->save($offer2_2, true);
        $manager->getRepository(Offers::class)->save($offer4_1, true);
        $manager->getRepository(Offers::class)->save($offer1_1, true);
        $manager->getRepository(Offers::class)->save($offer1_2, true);
        $manager->getRepository(Offers::class)->save($offer3_2, true);
        $manager->getRepository(Offers::class)->save($offer4_2, true);
        $manager->getRepository(Offers::class)->save($offer1_3, true);
        $manager->getRepository(Offers::class)->save($offer3_1, true);
        $manager->getRepository(Offers::class)->save($offer2_1, true);
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            EnterpriseFixtures::class
        ];
    }
}