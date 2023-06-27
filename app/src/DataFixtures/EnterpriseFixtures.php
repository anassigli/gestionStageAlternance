<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EnterpriseFixtures extends Fixture implements DependentFixtureInterface
{
    public const ENTERPRISE1 = 'enterprise1';

    public const ENTERPRISE2 = 'enterprise2';

    public function load(ObjectManager $manager)
    {
        $enterprise1 = (new Enterprise())
            ->setEmail("enterprise1@mail.com")
            ->setName("CGI")
            ->setDescription("Fondée en 1976, CGI figure parmi les plus importantes entreprises de services-conseils en technologie de l’information (TI) et en management au monde. Nous sommes guidés par les faits et axés sur les résultats afin d’accélérer le rendement de vos investissements.")
            ->setUser($this->getReference(UserFixtures::USER_ENTERPRISE1))
            ->setCity("Bordeaux")
            ->setDepartment("33000")
            ->setImageName("test")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::ENTERPRISE1, $enterprise1);
        $manager->getRepository(Enterprise::class)->save($enterprise1, true);

        $enterprise2 = (new Enterprise())
            ->setEmail("enterprise2@mail.com")
            ->setName("Multimédia SOLUTIONS")
            ->setDescription("Multimédia SOLUTIONS est éditeur de logiciels de Gestion Électronique de Documents. . Forte de plus de 23 ans d'expertise, nous proposons nos logiciels Windex GED, BotServer et eFoms aux PME et grands-groupes de tous métiers.")
            ->setUser($this->getReference(UserFixtures::USER_ENTERPRISE2))
            ->setCity("Cestas")
            ->setDepartment("33610")
            ->setImageName("test")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::ENTERPRISE2, $enterprise2);
        $manager->getRepository(Enterprise::class)->save($enterprise2, true);
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            UserFixtures::class,
        ];
    }
}