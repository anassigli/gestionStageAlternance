<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OffersFixtures extends Fixture implements DependentFixtureInterface
{
    public const OFFER1 = 'offer1';
    public function load(ObjectManager $manager)
    {
        $offer = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack")
            ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim quam. Nulla maximus nisi felis, eget ornare massa accumsan tempor. Vivamus tempus venenatis turpis, vitae porttitor justo. Maecenas interdum gravida scelerisque. Nunc egestas purus quis consectetur pellentesque. Sed ut efficitur neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi non blandit diam. Vivamus sit amet neque eu ex pharetra imperdiet. Vestibulum sagittis pellentesque erat sit amet aliquam. In sit amet odio felis. Vestibulum tincidunt massa lorem, et luctus orci rhoncus eu. Quisque in elit tincidunt, tincidunt mauris ac, mattis arcu. Nullam faucibus sem vel orci congue imperdiet. Mauris cursus tempus aliquam. ")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        ;
        $this->addReference(self::OFFER1, $offer);
        $manager->getRepository(Enterprise::class)->save($offer, true);
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class
        ];
    }
}