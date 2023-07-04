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
            ->setDescription('Lorsque vous rejoignez CGI, vous devenez un conseiller de confiance, collaborant avec vos collègues et clients pour proposer des idées exploitables qui produisent des résultats concrets et durables. 
            Nous appelons nos employés "membres" parce qu’ils sont actionnaires et propriétaires de CGI. Ils ont du plaisir à travailler et à grandir ensemble pour bâtir une entreprise dont nous sommes fiers. C’est notre rêve depuis 1976. 
            Il nous a menés là où nous sommes aujourd’hui – l’une des plus importantes entreprises indépendantes de conseil en technologie de l’information (TI) et en management au monde. Chez CGI, nous reconnaissons la richesse que la 
            diversité nous apporte. Nous aspirons à créer une culture à laquelle nous appartenons tous et collaborons avec nos clients pour créer des communautés plus inclusives. En tant qu’employeur qui prône l’égalité des chances pour tous, 
            nous voulons donner à tous nos membres les moyens de réussir et de s’épanouir. Si vous avez besoin d’un accompagnement spécifique durant le processus de recrutement et d’intégration, veuillez nous en informer. Nous serons heureux de vous aider.')
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_2 = (new Offers())
            ->setName("Stage Développeur JAVA/Angular H/F" )
            ->setDescription("

    Fonctions et responsabilités

Qualités requises pour réussir dans ce rôle

Donnez un élan à votre carrière.

    Le secteur des technologies de l’information (TI) connaît une période extraordinaire. La transformation numérique des organisations continue de s’accélérer, et CGI est au premier plan de ce changement. Nous accompagnons nos clients dans leur démarche numérique et offrons à nos professionnels des opportunités de carrière stimulantes.

    La réussite de CGI repose sur le talent et l’engagement de nos professionnels. Ensemble, nous relevons les défis et partageons les bénéfices issus de la croissance de notre entreprise. Cette approche renforce notre culture d’actionnaire-propriétaire ainsi, tous nos professionnels bénéficient de la valeur que nous créons collectivement.

    Joignez-vous à nous pour prendre part à la croissance de l’une des plus importantes entreprises indépendantes de services en technologies de l’information (TI) et en gestion des processus d’affaires au monde.

    Pour en savoir davantage à propos de CGI : www.cgi.com.

    Les candidatures non sollicitées provenant de cabinets de recrutement ne seront pas retenues.

    CGI favorise l’équité en matière d’emploi.")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::WAITING));

        $offer1_3 = (new Offers())
            ->setName("Alternance - Developer Web H/F")
            ->setDescription("Chez CGI, leader mondial du conseil et des services numériques, nous sommes convaincus que le digital et l’innovation sont de formidables leviers pour accélérer la transformation de la société et mettre la technologie au service du plus grand nombre.


Nos 78 000 experts dans le monde, dont 11 000 en France, accompagnent au quotidien les entreprises et les administrations de la stratégie à la mise en œuvre de leur transformation IT pour les rendre plus performantes, autant d’enjeux qui rythmeront votre quotidien aux côtés de nos professionnels.


Nous avons combiné des capacités industrielles et des expertises de haut niveau sur les technologies digitales les plus innovantes pour créer un centre d'innovation digitale dans l’objectif d’accompagner les grandes entreprises pour tirer le meilleur parti du numérique.


    Nos équipes sont passionnées d’automatisation, d’Intelligence Artificielle, de CRM, de BI/Big Data, de Design Thinking, de Web, de Mobilité, de cybersécurité, …, qu’elles mettent en œuvre sur tous les secteurs d’activités (industrie, banque, assurance, retail, médias,…) pour des clients de la France entière mais aussi à l’international.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_1 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation.
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement.
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées.

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_2 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack" )
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation.
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement.
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées.

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::WAITING));

        $offer3_1 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests.

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc.

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft.

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_2 = (new Offers())
            ->setName("Développeur C# H/F" )
            ->setDescription("En quoi consiste le poste ?
        Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests.

    Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc.

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft.

    On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer4_1 = (new Offers())
            ->setName("Alternance - Développeur Kotlin H/F")
            ->setDescription("Depuis sa création en 2005, Betclic est une société de technologie "mobile-only", animée par une passion inébranlable pour le sport. Guidé par l'émotion et le plaisir du jeu, Betclic développe des applications de divertissement mobile et place ses clients au cœur d’une expérience de jeu unique en innovant avec agilité et rapidité pour offrir toujours plus de jeux et plus de fun à ses joueurs. Notre ambition ? Proposer à nos clients l’expérience de jeu la plus divertissante grâce à des applications simples, immersives et innovantes.

Betclic, dont le siège est à Bordeaux, est une entreprise multiculturelle et internationale qui compte plus de 43 nationalités parmi ses 950 collaborateurs répartis dans 5 pays d’Europe : France, Italie, Malte, Pologne, et Portugal.

Les profils recherchés sont ceux qui ont l’ambition de construire en équipe, qui sont prêts à relever des challenges tous plus passionnants les uns que les autres, et qui ont cette volonté de créer des solutions offrant une expérience client inédite. ")
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
        $manager->getRepository(Offers::class)->save($offer1_1, true);

        $this->addReference(self::OFFER_ENTERPRISE1_2, $offer1_2);
        $this->setReference(self::OFFER_ENTERPRISE1_2, $offer1_2);
        $manager->getRepository(Offers::class)->save($offer1_2, true);

        $this->addReference(self::OFFER_ENTERPRISE1_3, $offer1_3);
        $this->setReference(self::OFFER_ENTERPRISE1_3, $offer1_3);
        $manager->getRepository(Offers::class)->save($offer1_3, true);

        $this->addReference(self::OFFER_ENTERPRISE2_1, $offer2_1);
        $this->setReference(self::OFFER_ENTERPRISE2_1, $offer2_1);
        $manager->getRepository(Offers::class)->save($offer2_1, true);

        $this->addReference(self::OFFER_ENTERPRISE2_2, $offer2_2);
        $this->setReference(self::OFFER_ENTERPRISE2_2, $offer2_2);
        $manager->getRepository(Offers::class)->save($offer2_2, true);

        $this->addReference(self::OFFER_ENTERPRISE3_1, $offer3_1);
        $this->setReference(self::OFFER_ENTERPRISE3_1, $offer3_1);
        $manager->getRepository(Offers::class)->save($offer3_1, true);

        $this->addReference(self::OFFER_ENTERPRISE3_2, $offer3_2);
        $this->setReference(self::OFFER_ENTERPRISE3_2, $offer3_2);
        $manager->getRepository(Offers::class)->save($offer3_2, true);

        $this->addReference(self::OFFER_ENTERPRISE4_1, $offer4_1);
        $this->setReference(self::OFFER_ENTERPRISE4_1, $offer4_1);
        $manager->getRepository(Offers::class)->save($offer4_1, true);

        $this->addReference(self::OFFER_ENTERPRISE4_2, $offer4_2);
        $this->setReference(self::OFFER_ENTERPRISE4_2, $offer4_2);
        $manager->getRepository(Offers::class)->save($offer4_2, true);









    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            EnterpriseFixtures::class
        ];
    }
}