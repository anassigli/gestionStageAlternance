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
    public const ENTERPRISE3 = 'enterprise3';
    public const ENTERPRISE4 = 'enterprise4';
    public const ENTERPRISE5 = 'enterprise5';

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

        $enterprise3 = (new Enterprise())
            ->setEmail("enterprise3@mail.com")
            ->setName("Capgemini")
            ->setDescription("Le groupe Capgemini, comme beaucoup de ses concurrents, s'est constitué à travers de multiples acquisitions dans tous les secteurs d'activités liés aux services informatiques : consulting, intégration de systèmes, infogérance. Près de 40 acquisitions (petites ou grandes entreprises) ont été réalisées en 40 ans.")
            ->setUser($this->getReference(UserFixtures::USER_ENTERPRISE3))
            ->setCity("Bordeaux")
            ->setDepartment("33000")
            ->setImageName("test")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::ENTERPRISE3, $enterprise3);
        $manager->getRepository(Enterprise::class)->save($enterprise3, true);

        $enterprise4 = (new Enterprise())
            ->setEmail("enterprise4@mail.com")
            ->setName("Betclic Group")
            ->setDescription("Betclic ou Betclic Everest Group est une entreprise française de paris sportifs, poker en ligne et de sport hippique créé en 2005 à Londres par Eric Moncada et Nicolas Béraud. Elle revendique 11 millions de joueurs inscrits sur sa plateforme en ligne. Betclic est une filiale de FL Entertainment, qui détient aussi l'entreprise Banijay.")
            ->setUser($this->getReference(UserFixtures::USER_ENTERPRISE4))
            ->setCity("Bordeaux")
            ->setDepartment("33000")
            ->setImageName("test")
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));
        $this->addReference(self::ENTERPRISE4, $enterprise4);
        $manager->getRepository(Enterprise::class)->save($enterprise4, true);

         }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            UserFixtures::class,
        ];
    }
}