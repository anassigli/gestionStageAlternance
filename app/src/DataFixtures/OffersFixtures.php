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


    public const OFFER_ENTERPRISE5_1 = 'offer_enterprise5_1';
    public const OFFER_ENTERPRISE5_2 = 'offer_enterprise5_2';


    public const OFFER_ENTERPRISE6_1 = 'offer_enterprise6_1';
    public const OFFER_ENTERPRISE6_2 = 'offer_enterprise6_2';


    public const OFFER_ENTERPRISE7_1 = 'offer_enterprise7_1';
    public const OFFER_ENTERPRISE7_2 = 'offer_enterprise7_2';


    public const OFFER_ENTERPRISE8_1 = 'offer_enterprise8_1';
    public const OFFER_ENTERPRISE8_2 = 'offer_enterprise8_2';


    public function load(ObjectManager $manager)
    {
        $offer1_1 = (new Offers())
            ->setName("Alternance Développeur JAVA H/F")
            ->setDescription("Lorsque vous rejoignez CGI, vous devenez un conseiller de confiance, collaborant avec vos collègues et clients pour proposer des idées exploitables qui produisent des résultats concrets et durables.  \n
            Nous appelons nos employés ".'"membres"'." parce qu’ils sont actionnaires et propriétaires de CGI.  \n 
            Ils ont du plaisir à travailler et à grandir ensemble pour bâtir une entreprise dont nous sommes fiers. C’est notre rêve depuis 1976. \n
            Il nous a menés là où nous sommes aujourd’hui – l’une des plus importantes entreprises indépendantes de conseil en technologie de l’information (TI) et en management au monde. \n
            Chez CGI, nous reconnaissons la richesse que la diversité nous apporte. Nous aspirons à créer une culture à laquelle nous appartenons tous et collaborons avec nos clients pour créer des communautés plus inclusives. \n
            En tant qu’employeur qui prône l’égalité des chances pour tous, 
            nous voulons donner à tous nos membres les moyens de réussir et de s’épanouir. \n \n
            Si vous avez besoin d’un accompagnement spécifique durant le processus de recrutement et d’intégration, veuillez nous en informer. Nous serons heureux de vous aider.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setCreatedAt(new \DateTimeImmutable('2022-09-09 19:50:39'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_2 = (new Offers())
            ->setName("Stage Développeur JAVA/Angular H/F" )
            ->setDescription("

    Fonctions et responsabilités \n \n

Qualités requises pour réussir dans ce rôle \n \n

Donnez un élan à votre carrière. \n \n

    Le secteur des technologies de l’information (TI) connaît une période extraordinaire. La transformation numérique des organisations continue de s’accélérer, et CGI est au premier plan de ce changement. Nous accompagnons nos clients dans leur démarche numérique et offrons à nos professionnels des opportunités de carrière stimulantes. \n \n

    La réussite de CGI repose sur le talent et l’engagement de nos professionnels. Ensemble, nous relevons les défis et partageons les bénéfices issus de la croissance de notre entreprise. Cette approche renforce notre culture d’actionnaire-propriétaire ainsi, tous nos professionnels bénéficient de la valeur que nous créons collectivement. \n \n

    Joignez-vous à nous pour prendre part à la croissance de l’une des plus importantes entreprises indépendantes de services en technologies de l’information (TI) et en gestion des processus d’affaires au monde. \n \n

    Pour en savoir davantage à propos de CGI : www.cgi.com. \n \n

    Les candidatures non sollicitées provenant de cabinets de recrutement ne seront pas retenues. \n \n 

    CGI favorise l’équité en matière d’emploi.")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-14 16:34:14'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1));


        $offer1_3 = (new Offers())
            ->setName("Alternance - Developer Web H/F")
            ->setDescription("Chez CGI, leader mondial du conseil et des services numériques, nous sommes convaincus que le digital et l’innovation sont de formidables leviers pour accélérer la transformation de la société et mettre la technologie au service du plus grand nombre. \n \n

Nos 78 000 experts dans le monde, dont 11 000 en France, accompagnent au quotidien les entreprises et les administrations de la stratégie à la mise en œuvre de leur transformation IT pour les rendre plus performantes, autant d’enjeux qui rythmeront votre quotidien aux côtés de nos professionnels. \n \n

Nous avons combiné des capacités industrielles et des expertises de haut niveau sur les technologies digitales les plus innovantes pour créer un centre d'innovation digitale dans l’objectif d’accompagner les grandes entreprises pour tirer le meilleur parti du numérique. \n \n


    Nos équipes sont passionnées d’automatisation, d’Intelligence Artificielle, de CRM, de BI/Big Data, de Design Thinking, de Web, de Mobilité, de cybersécurité, …, qu’elles mettent en œuvre sur tous les secteurs d’activités (industrie, banque, assurance, retail, médias,…) pour des clients de la France entière mais aussi à l’international.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setCreatedAt(new \DateTimeImmutable('2022-09-20 08:12:54'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));



//Enterprise2
        $offer2_1 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-10 14:50:39'))
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2));


        $offer2_2 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack" )
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation.\n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement.\n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées.\n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-15 09:50:39'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2));





//Enterprise3
        $offer3_1 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-09-16 09:50:39'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3));


        $offer3_2 = (new Offers())
            ->setName("Développeur C# H/F" )
            ->setDescription("En quoi consiste le poste ?\n
        Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

    Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

    On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-10-04 09:50:39'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3));




        //Enterprise4
        $offer4_1 = (new Offers())
            ->setName("Alternance - Développeur Kotlin H/F")
            ->setDescription("Depuis sa création en 2005, Betclic est une société de technologie ".'"mobile-only"'.", animée par une passion inébranlable pour le sport. Guidé par l'émotion et le plaisir du jeu, Betclic développe des applications de divertissement mobile et place ses clients au cœur d’une expérience de jeu unique en innovant avec agilité et rapidité pour offrir toujours plus de jeux et plus de fun à ses joueurs. \n
             Notre ambition ? Proposer à nos clients l’expérience de jeu la plus divertissante grâce à des applications simples, immersives et innovantes. \n \n

Betclic, dont le siège est à Bordeaux, est une entreprise multiculturelle et internationale qui compte plus de 43 nationalités parmi ses 950 collaborateurs répartis dans 5 pays d’Europe : France, Italie, Malte, Pologne, et Portugal. \n \n

Les profils recherchés sont ceux qui ont l’ambition de construire en équipe, qui sont prêts à relever des challenges tous plus passionnants les uns que les autres, et qui ont cette volonté de créer des solutions offrant une expérience client inédite. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-12-15 17:34:13'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE4));

        $offer4_2 = (new Offers())
            ->setName("Alternance - Développeur Angular H/F" )
            ->setDescription("Dans ce cadre, vos missions sont les suivantes :\n\n

Conception des différents écrans de lutte contre la fraudeValidation des maquettesCo-conception des Apis
Développement , recette et monitoring de la solution
Rédaction de la documentation \n
Nous considérons qu'un développeur sait autant communiquer, challenger, concevoir que coder. \n \n

TECHNICAL ENVIRONMENT \n \n

Angular 14 / Ngrx / Jest \n 
Aws / Jenkins \n 
WHO WE ARE LOOKING FOR? \n \n

Des collaborateurs avec une bonne dose d'humour, du respect et de la bienveillance, un amour pour la technique, un peu de zèle et une réelle passion pour leur métier \n \n

Cette alternance est faite pour vous si : \n \n

En cours de formation Bac+4/5 en développement informatique, vous disposez d'une première expérience (stage ou projet d'études) en développement Angular. \n
Vous avez envie d'évoluer dans une équipe dynamique et un environnement agile \n
Vous êtes curieux, autonome et que vous avez l'envie d'apprendre\n
WHAT CAN YOU EXPECT? \n \n

Une carte Ticket Restaurant financée à hauteur de 50% (10€/ jour) \n
Un abonnement de transport pris en charge à hauteur de 50% ou une prime annuelle de mobilité durable (200€ pour les trajets domicile – travail en transport durable) \n
Des locaux hors du commun avec un rooftop aménagé pour profiter d'animations régulières, de pauses et de déjeuners au soleil face à la Cité du Vin \n
Des cours de sports 2 fois par semaine")
            ->setDepartment("33160")
            ->setCreatedAt(new \DateTimeImmutable('2022-12-21 18:06:52'))
            ->setCity("Cestas")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE4));





//Enterprise5
        $offer5_1 = (new Offers())
            ->setName("Développeur - Java")
            ->setDescription("Votre rôle et missions \n \n

Vous participez à toutes les activités de construction et de maintenance d'un système d'informations : \n \n 

 - Analyse du besoin (secteurs télécommunication, industrie, aérien, etc.) \n
 - Conception technique et développement (JAVA 8 et plus, Spring, Springboot, Tomcat, OpenAPI, SQL / NoSQL, Angular, etc.) \n
 - Environnement et développement : Linux, Microsoft Cloud Azure, IntelliJ/ Eclipse, etc. \n
 - Tests d’intégration et tests unitaires (JUnit, TDD / BDD, etc.) \n
 - Mise en place d’API et Microservices (Docker, Ansible, GIT, Gitlab, K8S, Jenkins, etc.)\n
 - Processus qualité : principes de craftsmanship, Sonar, revue de code\n
 - Méthodes agiles (SAFe, Scrum, Kanban, etc.)\n 
\n
Qualifications \n
 \n
Diplômé d'un bac +5 (écoles d'Ingénieurs grandes écoles ou Universités) ou formation équivalente, vous justifiez d'une première expérience (stages compris) dans le développement, l'architecture technique ou l'analyse fonctionnelle de solutions applicatives dans des environnements java.
Votre sens du service, votre rigueur, vos qualités relationnelles avérées et vos compétences méthodologiques et technologiques, vous permettront d'évoluer au sein de l'agence de Sophia-Antipolis vers les différentes filières métiers.6")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-02-12 12:40:23'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE5));

        $offer5_2 = (new Offers())
            ->setName("Stage - Développeur JAVA H/F")
            ->setDescription("Votre futur environnement de travail \n
Vous intégrerez notre équipe accompagnant un grand acteur traitant des aides publiques en France. \n
Cette équipe réalise des projets à forts enjeux dans le cadre de la transformation digitale de notre client. Afin de mener à bien votre mission, une équipe jeune et dynamique se tiendra à votre disposition pour répondre à toutes vos questions. \n
\n
Les missions du stage \n
Vous participerez à des projets d'envergure permettant l'évolution du système d'information. Dans ce cadre, vous serez amené(e) à : \n
- Travailler dans un contexte agile \n
- Réaliser des évolutions  \n
- Utiliser nos outils d'intégration \n
- Apporter de nouvelles idées d'amélioration \n
- Participer à la montée en valeur de notre client sur les technologies innovantes : Intelligence Artificielle, Mobilité, etc. \n
\n
Les apports du stage \n
- Appréhender le cycle de développement d'un projet, de l'expression du besoin à la mise en production \n
- Apprécier les outils d'industrialisation d'un projet de grande ampleur \n
- Parfaire vos connaissances sur des technologies récentes et innovantes \n
- Monter en compétences sur des méthodologies nouvelles comme le Lean-IT \n
- S'initier à la Méthode Agile \n
 \n
Technos utilisées : JAVA/JEE, Angular 5, Bootstrap, Maven, Jenkins, Sonar, MySQL, Junit, Mockito, JIRA, Icescrum, Mantis")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-02-20 09:12:42'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE5));




//Entreprise 6
        $offer6_1 = (new Offers())
            ->setName("Alternance Data Scientist")
            ->setDescription("Développement de modèles \n
\n
 - Concevoir, développer et maintenir les modèles de machine learning / deep learning de netcarbon. (segmentation d'image, serie temporelle) \n
 - Maintenir un haut niveau de qualité de code : revue de code, clean code, tests unitaires, documentation. \n
 \n 
Conception produit \n
\n
Tu contribues à la conception des applications en apportant ton expérience dans la définition de fonctionnalités réalisables techniquement.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-04-13 08:04:53'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE6));

        $offer6_2 = (new Offers())
            ->setName("Alternance Développeur.se full stack")
            ->setDescription("Développement des applications \n
\n
 - Concevoir, développer et maintenir la partie front et back des applications netcarbon. \n
 - Maintenir un haut niveau de qualité de code : revue de code, clean code, tests unitaires, documentation. \n
 \n
Conception produit \n
\n
 - Tu contribues à la conception des applications en apportant ton expérience dans la définition de fonctionnalités réalisables techniquement. \n
 - Tu apportes tes idées et ta créativité pour concevoir une UI agréable et intuitive. \n
\n
Suivi du projet et développement de l’équipe \n
\n
 - Tu partages au reste de l’équipe tes connaissances et les dernières technologies qui pourraient améliorer nos pratiques \n
 - Tu contribues aux rituels agiles de l’équipe : sprint planning, démo, rétrospectives")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-04-25 15:24:35'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE6));



        //Enterprise7
        $offer7_1 = (new Offers())
            ->setName("Stagiaire informatique H/F: Gestion Utilisateurs Windows (C++/Win Api)")
            ->setDescription("En tant que stagiaire informatique au sein de l’équipe R&D, vous participerez à la mise en place d’un module de gestionnaire d’utilisateurs sous Windows en mode local ou en mode Active Directory. \n
\n
Vous devrez aussi mettre en place une IHM sous Qt pour gérer les fonctionnalités de ce module. \n
\n
Le stage sera articulé autour des axes suivants : \n
 \n
 - Compréhension des besoins fonctionnels \n
 - Développement du module de gestion d’utilisateurs \n
 - Tests \n
 - Rédaction de documentation")
            ->setDepartment("33318")
            ->setCity("Pessac")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-06-28 23:02:03'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE7));


        $offer7_2 = (new Offers())
            ->setName("Stagiaire informatique H/F: Module OPC UA (C++/Qt)")
            ->setDescription("En tant que stagiaire informatique au sein de l’équipe R&D, vous participerez à la mise en place d’un module de gestionnaire d’utilisateurs sous Windows en mode local ou en mode Active Directory. \n
\n
Vous devrez aussi mettre en place une IHM sous Qt pour gérer les fonctionnalités de ce module. \n
\n
Le stage sera articulé autour des axes suivants : \n
 \n
 - Compréhension des besoins fonctionnels \n
 - Développement du module de gestion d’utilisateurs \n
 - Tests \n
 - Rédaction de documentation")
            ->setDepartment("33318")
            ->setCity("Pessac")
            ->setCreatedAt(new \DateTimeImmutable('2022-06-30 17:54:13'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE7))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));


        //Enterprise8
        $offer8_1 = (new Offers())
            ->setName("Alternance Développeur Web PHP H/F")
            ->setDescription("Participer à la conception technique, au paramétrage et à la rédaction des spécifications techniques des évolutions \n
    . Développer et maintenir des briques aussi bien backend (APIs, MariaDB, …) que Frontend \n
    . Optimiser la performance des applications. \n
    . Fournir du code de qualité et ainsi garantir la qualité des mises en production \n
    . Travail en équipe en méthodologie agile \n
    . Participer au traitement des priorités des flux d'anomalies clients et de recette interne QA. \n
\n
Nos challenges sont nombreux, que ce soit métiers (l’internationalisation, cartographie, optimisation de circuits, des intégrations à des services tiers, expérience utilisateur multi-canal etc...) ou techniques (la scalabilité, la tenue en charge, une architecture distribuée, hybride (on premise, SaaS). \n
\n
Nous recherchons une personne capable de s’intégrer dans une équipe distribuée sur plusieurs sites. Cela implique une bonne capacité de communication, une capacité à vulgariser les sujets complexes, une très forte sensibilité à la qualité, une flexibilité face aux priorités commerciales changeantes, ouvert à de nouvelles idées et un focus client. \n
\n
Une partie de notre stack technique (liste non exhaustive) pour situer le contexte : \n
\n
    Front-end web : HTML \n
    Back-end : PHP \n
    IDEs : PHPStorm \n
    DB : MySQL \n
    SIG : BusinessGeographic/GEO \n
    Backend sous Unix : en C/C++ \n
Nous travaillons en mode agile, sur Teams, et la suite Microsoft Office, Git, EasyRedmine, Squash …")
            ->setDepartment("33310")
            ->setCity("Lormont")
            ->setCreatedAt(new \DateTimeImmutable('2022-07-03 08:38:19'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE8))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer8_2 = (new Offers())
            ->setName("Alternance - Développement d’Applications Web PHP (Ecobox)")
            ->setDescription("Intégré à une équipe de développement d’une quinzaine de personnes, vous participerez au développement et à la maintenance de notre plateforme ECOBOXCarto (Web / API / backend / DB / SIG). \n
\n
Notre stack logiciel cible intègre des technologies s’articulant autour de notre plateforme logicielle SaaS et multi tenant : PHP, MySQL, Sentry, Graylog, SIG BusinessGeographic/GEO \n
 \n
Vous reporterez au responsable de l’équipe.\n
\n
Vos activités types seront les suivantes : \n
\n 
Participer à la maintenance évolutive et corrective de l’application ECOBOXCarto \n
Analyse de l'existant, proposer des évolutions techniques de la solution quand vous le jugerez nécessaire. \n
Etendre et reprendre la documentation de l’application pour les développeurs \n
Décrire la solution technique répondant à de nouvelles user stories \n
Comprendre et intégrer vos développements dans notre process d’intégration continue \n
Développer des tests unitaires et fonctionnels sur tout nouveau code. \n
Optimiser la performance de l’application. \n
Prendre soin à la qualité du code (via des revues de codes, revues des exécutions de campagne de tests, maintenabilité du code et production et maintien de nos documentations utilisateurs) \n
Travail en équipe en méthodologie agile \n
Participer au traitement des priorités des flux d’anomalies clients et de recette interne QA.")
            ->setDepartment("33300")
            ->setCity("Bordeaux")
            ->setStatus($this->getReference(StatusFixtures::FILLED))
            ->setCreatedAt(new \DateTimeImmutable('2022-07-05 15:28:56'))
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE8));



///////////////////////////////////////////////////////////////////////////////////////////

        $this->addReference(self::OFFER_ENTERPRISE1_1, $offer1_1);
        $this->setReference(self::OFFER_ENTERPRISE1_1, $offer1_1);
        $manager->getRepository(Offers::class)->save($offer1_1, true);

        $this->addReference(self::OFFER_ENTERPRISE1_2, $offer1_2);
        $this->setReference(self::OFFER_ENTERPRISE1_2, $offer1_2);
        $manager->getRepository(Offers::class)->save($offer1_2, true);

        $this->addReference(self::OFFER_ENTERPRISE1_3, $offer1_3);
        $this->setReference(self::OFFER_ENTERPRISE1_3, $offer1_3);
        $manager->getRepository(Offers::class)->save($offer1_3, true);


//Entreprise 2
        $this->addReference(self::OFFER_ENTERPRISE2_1, $offer2_1);
        $this->setReference(self::OFFER_ENTERPRISE2_1, $offer2_1);
        $manager->getRepository(Offers::class)->save($offer2_1, true);

        $this->addReference(self::OFFER_ENTERPRISE2_2, $offer2_2);
        $this->setReference(self::OFFER_ENTERPRISE2_2, $offer2_2);
        $manager->getRepository(Offers::class)->save($offer2_2, true);


//Entreprise 3
        $this->addReference(self::OFFER_ENTERPRISE3_1, $offer3_1);
        $this->setReference(self::OFFER_ENTERPRISE3_1, $offer3_1);
        $manager->getRepository(Offers::class)->save($offer3_1, true);

        $this->addReference(self::OFFER_ENTERPRISE3_2, $offer3_2);
        $this->setReference(self::OFFER_ENTERPRISE3_2, $offer3_2);
        $manager->getRepository(Offers::class)->save($offer3_2, true);


//Entreprise 4
        $this->addReference(self::OFFER_ENTERPRISE4_1, $offer4_1);
        $this->setReference(self::OFFER_ENTERPRISE4_1, $offer4_1);
        $manager->getRepository(Offers::class)->save($offer4_1, true);

        $this->addReference(self::OFFER_ENTERPRISE4_2, $offer4_2);
        $this->setReference(self::OFFER_ENTERPRISE4_2, $offer4_2);
        $manager->getRepository(Offers::class)->save($offer4_2, true);


//Entreprise 5
        $this->addReference(self::OFFER_ENTERPRISE5_1, $offer5_1);
        $this->setReference(self::OFFER_ENTERPRISE5_1, $offer5_1);
        $manager->getRepository(Offers::class)->save($offer5_1, true);

        $this->addReference(self::OFFER_ENTERPRISE5_2, $offer5_2);
        $this->setReference(self::OFFER_ENTERPRISE5_2, $offer5_2);
        $manager->getRepository(Offers::class)->save($offer5_2, true);


//Entreprise 6
        $this->addReference(self::OFFER_ENTERPRISE6_1, $offer6_1);
        $this->setReference(self::OFFER_ENTERPRISE6_1, $offer6_1);
        $manager->getRepository(Offers::class)->save($offer6_1, true);

        $this->addReference(self::OFFER_ENTERPRISE6_2, $offer6_2);
        $this->setReference(self::OFFER_ENTERPRISE6_2, $offer6_2);
        $manager->getRepository(Offers::class)->save($offer6_2, true);

        //Entreprise 7
        $this->addReference(self::OFFER_ENTERPRISE7_1, $offer7_1);
        $this->setReference(self::OFFER_ENTERPRISE7_1, $offer7_1);
        $manager->getRepository(Offers::class)->save($offer7_1, true);

        $this->addReference(self::OFFER_ENTERPRISE7_2, $offer7_2);
        $this->setReference(self::OFFER_ENTERPRISE7_2, $offer7_2);
        $manager->getRepository(Offers::class)->save($offer7_2, true);


        //Entreprise 8
        $this->addReference(self::OFFER_ENTERPRISE8_1, $offer8_1);
        $this->setReference(self::OFFER_ENTERPRISE8_1, $offer8_1);
        $manager->getRepository(Offers::class)->save($offer8_1, true);

        $this->addReference(self::OFFER_ENTERPRISE8_2, $offer8_2);
        $this->setReference(self::OFFER_ENTERPRISE8_2, $offer8_2);
        $manager->getRepository(Offers::class)->save($offer8_2, true);
    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            EnterpriseFixtures::class
        ];
    }
}