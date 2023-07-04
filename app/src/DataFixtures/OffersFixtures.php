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
    public const OFFER_ENTERPRISE1_4 = 'offer_enterprise1_4';
    public const OFFER_ENTERPRISE1_5 = 'offer_enterprise1_5';
    public const OFFER_ENTERPRISE1_6 = 'offer_enterprise1_6';
    public const OFFER_ENTERPRISE1_7 = 'offer_enterprise1_7';
    public const OFFER_ENTERPRISE1_8 = 'offer_enterprise1_8';
    public const OFFER_ENTERPRISE1_9 = 'offer_enterprise1_9';
    public const OFFER_ENTERPRISE1_10 = 'offer_enterprise1_10';
    public const OFFER_ENTERPRISE2_1 = 'offer_enterprise2_1';
    public const OFFER_ENTERPRISE2_2 = 'offer_enterprise2_2';
    public const OFFER_ENTERPRISE2_3 = 'offer_enterprise2_3';
    public const OFFER_ENTERPRISE2_4 = 'offer_enterprise2_4';
    public const OFFER_ENTERPRISE2_5 = 'offer_enterprise2_5';
    public const OFFER_ENTERPRISE2_6 = 'offer_enterprise2_6';
    public const OFFER_ENTERPRISE2_7 = 'offer_enterprise2_7';
    public const OFFER_ENTERPRISE2_8 = 'offer_enterprise2_8';
    public const OFFER_ENTERPRISE2_9 = 'offer_enterprise2_9';
    public const OFFER_ENTERPRISE2_10 = 'offer_enterprise2_10';
    public const OFFER_ENTERPRISE3_1 = 'offer_enterprise3_1';
    public const OFFER_ENTERPRISE3_2 = 'offer_enterprise3_2';


    public const OFFER_ENTERPRISE4_1 = 'offer_enterprise4_1';
    public const OFFER_ENTERPRISE4_2 = 'offer_enterprise4_2';

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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_3 = (new Offers())
            ->setName("Alternance - Developer Web H/F")
            ->setDescription("Chez CGI, leader mondial du conseil et des services numériques, nous sommes convaincus que le digital et l’innovation sont de formidables leviers pour accélérer la transformation de la société et mettre la technologie au service du plus grand nombre. \n \n

Nos 78 000 experts dans le monde, dont 11 000 en France, accompagnent au quotidien les entreprises et les administrations de la stratégie à la mise en œuvre de leur transformation IT pour les rendre plus performantes, autant d’enjeux qui rythmeront votre quotidien aux côtés de nos professionnels. \n \n

Nous avons combiné des capacités industrielles et des expertises de haut niveau sur les technologies digitales les plus innovantes pour créer un centre d'innovation digitale dans l’objectif d’accompagner les grandes entreprises pour tirer le meilleur parti du numérique. \n \n


    Nos équipes sont passionnées d’automatisation, d’Intelligence Artificielle, de CRM, de BI/Big Data, de Design Thinking, de Web, de Mobilité, de cybersécurité, …, qu’elles mettent en œuvre sur tous les secteurs d’activités (industrie, banque, assurance, retail, médias,…) pour des clients de la France entière mais aussi à l’international.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_4 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_5 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_6 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_7 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_8 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_9 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer1_10 = (new Offers())
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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE1))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_1 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

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
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_3 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_4 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_5 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_6 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_7 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_8 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_9 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer2_10 = (new Offers())
            ->setName("Offre d'alternance de développeur FullStack ")
            ->setDescription("La gestion électronique de documents (GED) est une méthode pour stocker, organiser et partager des documents numériques au sein d’une entreprise ou d’une organisation. \n
Elle implique l’utilisation d’un logiciel pour remplacer les méthodes de gestion de documents traditionnelles telles que les classeurs et les boîtes de rangement. \n
La GED permet de stocker de grandes quantités de documents en toute sécurité, de les retrouver rapidement et de les partager facilement avec les personnes concernées. \n \n

Les avantages de la GED incluent une meilleure organisation, une réduction des coûts, une amélioration de l’efficacité et une conformité accrue avec les réglementations sur les documents.\n
Optimisez la productivité de vos collaborateurs et la performance de votre entreprise grâce à notre logiciel de gestion électronique de documents Windex GED !\n
N’attendez plus pour optimiser la gestion collaborative de vos documents, leur partage et archivage !")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE2))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_1 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_2 = (new Offers())
            ->setName("Développeur C# H/F" )
            ->setDescription("En quoi consiste le poste ?\n
        Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

    Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

    On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33160")
            ->setCity("Cestas")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_3 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_4 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_5 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_6 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_7 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_8 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_9 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer3_10 = (new Offers())
            ->setName("Développeur C# H/F")
            ->setDescription("En quoi consiste le poste ?
Au sein d’une équipe agile travaillant sur des projets en technologies .NET, vous prenez part aux spécifications, à la définition de l’architecture technique, à la conception et au développement, sans oublier les tests. \n \n

Votre environnement technique est évolutif, c’est autant de compétences en plus à acquérir : .NET, .NET Core, C#, ASP, MVC, Web Services, Cloud Azur, TFS, Angular, React, etc. \n \n

Si vous êtes suffisamment à l’aise, vous pourrez aussi intervenir dans des missions d'accompagnement et d'expertise technique Microsoft. \n \n

On parlait de fun tout à l’heure, les aftwerworks, jeux ou parties de sport feront aussi partie de votre quotidien si vous le souhaitez ! Cliquez ici pour accéder aux témoignages de nos collaborateurs.")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE3))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

        $offer4_1 = (new Offers())
            ->setName("Alternance - Développeur Kotlin H/F")
            ->setDescription("Depuis sa création en 2005, Betclic est une société de technologie ".'"mobile-only"'.", animée par une passion inébranlable pour le sport. Guidé par l'émotion et le plaisir du jeu, Betclic développe des applications de divertissement mobile et place ses clients au cœur d’une expérience de jeu unique en innovant avec agilité et rapidité pour offrir toujours plus de jeux et plus de fun à ses joueurs. \n
             Notre ambition ? Proposer à nos clients l’expérience de jeu la plus divertissante grâce à des applications simples, immersives et innovantes. \n \n

Betclic, dont le siège est à Bordeaux, est une entreprise multiculturelle et internationale qui compte plus de 43 nationalités parmi ses 950 collaborateurs répartis dans 5 pays d’Europe : France, Italie, Malte, Pologne, et Portugal. \n \n

Les profils recherchés sont ceux qui ont l’ambition de construire en équipe, qui sont prêts à relever des challenges tous plus passionnants les uns que les autres, et qui ont cette volonté de créer des solutions offrant une expérience client inédite. ")
            ->setDepartment("33000")
            ->setCity("Bordeaux")
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE4))
            ->setStatus($this->getReference(StatusFixtures::VERIFIED));

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




        $this->addReference(self::OFFER_ENTERPRISE1_4, $offer1_4);
        $this->setReference(self::OFFER_ENTERPRISE1_4, $offer1_4);
        $manager->getRepository(Offers::class)->save($offer1_4, true);

        $this->addReference(self::OFFER_ENTERPRISE1_5, $offer1_5);
        $this->setReference(self::OFFER_ENTERPRISE1_5, $offer1_5);
        $manager->getRepository(Offers::class)->save($offer1_5, true);

        $this->addReference(self::OFFER_ENTERPRISE1_6, $offer1_6);
        $this->setReference(self::OFFER_ENTERPRISE1_6, $offer1_6);
        $manager->getRepository(Offers::class)->save($offer1_6, true);

        $this->addReference(self::OFFER_ENTERPRISE1_7, $offer1_7);
        $this->setReference(self::OFFER_ENTERPRISE1_7, $offer1_7);
        $manager->getRepository(Offers::class)->save($offer1_7, true);

        $this->addReference(self::OFFER_ENTERPRISE1_8, $offer1_8);
        $this->setReference(self::OFFER_ENTERPRISE1_8, $offer1_8);
        $manager->getRepository(Offers::class)->save($offer1_8, true);

        $this->addReference(self::OFFER_ENTERPRISE1_9, $offer1_9);
        $this->setReference(self::OFFER_ENTERPRISE1_9, $offer1_9);
        $manager->getRepository(Offers::class)->save($offer1_9, true);

        $this->addReference(self::OFFER_ENTERPRISE1_10, $offer1_10);
        $this->setReference(self::OFFER_ENTERPRISE1_10, $offer1_10);
        $manager->getRepository(Offers::class)->save($offer1_10, true);


        $this->addReference(self::OFFER_ENTERPRISE2_3, $offer2_3);
        $this->setReference(self::OFFER_ENTERPRISE2_3, $offer2_3);
        $manager->getRepository(Offers::class)->save($offer2_3, true);

        $this->addReference(self::OFFER_ENTERPRISE2_4, $offer2_4);
        $this->setReference(self::OFFER_ENTERPRISE2_4, $offer2_4);
        $manager->getRepository(Offers::class)->save($offer2_4, true);

        $this->addReference(self::OFFER_ENTERPRISE2_5, $offer2_5);
        $this->setReference(self::OFFER_ENTERPRISE2_5, $offer2_5);
        $manager->getRepository(Offers::class)->save($offer2_5, true);

        $this->addReference(self::OFFER_ENTERPRISE2_6, $offer2_6);
        $this->setReference(self::OFFER_ENTERPRISE2_6, $offer2_6);
        $manager->getRepository(Offers::class)->save($offer2_6, true);

        $this->addReference(self::OFFER_ENTERPRISE2_7, $offer2_7);
        $this->setReference(self::OFFER_ENTERPRISE2_7, $offer2_7);
        $manager->getRepository(Offers::class)->save($offer2_7, true);

        $this->addReference(self::OFFER_ENTERPRISE2_8, $offer2_8);
        $this->setReference(self::OFFER_ENTERPRISE2_8, $offer2_8);
        $manager->getRepository(Offers::class)->save($offer2_8, true);

        $this->addReference(self::OFFER_ENTERPRISE2_9, $offer2_9);
        $this->setReference(self::OFFER_ENTERPRISE2_9, $offer2_9);
        $manager->getRepository(Offers::class)->save($offer2_9, true);

        $this->addReference(self::OFFER_ENTERPRISE2_10, $offer2_10);
        $this->setReference(self::OFFER_ENTERPRISE2_10, $offer2_10);
        $manager->getRepository(Offers::class)->save($offer2_10, true);


        $this->addReference(self::OFFER_ENTERPRISE3_3, $offer3_3);
        $this->setReference(self::OFFER_ENTERPRISE3_3, $offer3_3);
        $manager->getRepository(Offers::class)->save($offer3_3, true);

        $this->addReference(self::OFFER_ENTERPRISE3_4, $offer3_4);
        $this->setReference(self::OFFER_ENTERPRISE3_4, $offer3_4);
        $manager->getRepository(Offers::class)->save($offer3_4, true);

        $this->addReference(self::OFFER_ENTERPRISE3_5, $offer3_5);
        $this->setReference(self::OFFER_ENTERPRISE3_5, $offer3_5);
        $manager->getRepository(Offers::class)->save($offer3_5, true);

        $this->addReference(self::OFFER_ENTERPRISE3_6, $offer3_6);
        $this->setReference(self::OFFER_ENTERPRISE3_6, $offer3_6);
        $manager->getRepository(Offers::class)->save($offer3_6, true);

        $this->addReference(self::OFFER_ENTERPRISE3_7, $offer3_7);
        $this->setReference(self::OFFER_ENTERPRISE3_7, $offer3_7);
        $manager->getRepository(Offers::class)->save($offer3_7, true);

        $this->addReference(self::OFFER_ENTERPRISE3_8, $offer3_8);
        $this->setReference(self::OFFER_ENTERPRISE3_8, $offer3_8);
        $manager->getRepository(Offers::class)->save($offer3_8, true);

        $this->addReference(self::OFFER_ENTERPRISE3_9, $offer3_9);
        $this->setReference(self::OFFER_ENTERPRISE3_9, $offer3_9);
        $manager->getRepository(Offers::class)->save($offer3_9, true);

        $this->addReference(self::OFFER_ENTERPRISE3_10, $offer3_10);
        $this->setReference(self::OFFER_ENTERPRISE3_10, $offer3_10);
        $manager->getRepository(Offers::class)->save($offer3_10, true);




    }

    public function getDependencies(): array
    {
        return [
            StatusFixtures::class,
            EnterpriseFixtures::class
        ];
    }
}