<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EnterpriseFixtures extends Fixture implements DependentFixtureInterface {
    public const ENTERPRISE1 = 'enterprise1';

    public function load(ObjectManager $manager)
    {
        $enterprise = (new Enterprise())
            ->setEmail("enterprise1@mail.com")
            ->setName("Thalès")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. ")
            ->setUser($this->getReference(UserFixtures::USER_ENTERPRISE1))
            ->setCity("Bordeaux")
            ->setDepartment("33000")
            ->setImageName("test")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::ENTERPRISE1, $enterprise);
        $manager->getRepository(Enterprise::class)->save($enterprise, true);
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            UserFixtures::class,
        ];
    }
}