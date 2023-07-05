<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture implements DependentFixtureInterface
{
    public const  TAGS = ["FullStack"=>CategoryFixtures::JOB, "Front"=>CategoryFixtures::JOB,
        "BackEnd"=>CategoryFixtures::JOB,
        "Administrateur réseaux"=>CategoryFixtures::JOB,
        "Technicien de maintenance"=>CategoryFixtures::JOB,
         "Java"=>CategoryFixtures::LANGUAGE,
        "JavaScript"=>CategoryFixtures::LANGUAGE, "CSS"=>CategoryFixtures::LANGUAGE,
        "PHP"=>CategoryFixtures::LANGUAGE,"Kotlin"=>CategoryFixtures::LANGUAGE,
        "Python"=>CategoryFixtures::LANGUAGE, "C#"=>CategoryFixtures::LANGUAGE,
        "C"=>CategoryFixtures::LANGUAGE, "Ruby"=>CategoryFixtures::LANGUAGE,
        "Rust"=>CategoryFixtures::LANGUAGE, "Cobol"=>CategoryFixtures::LANGUAGE,
        "Excel"=>CategoryFixtures::LANGUAGE,
        "Télétravail"=>CategoryFixtures::CONDITION,
        "De nuit"=>CategoryFixtures::CONDITION, "Stage"=>CategoryFixtures::OFFER_TYPE,
        "Alternance"=>CategoryFixtures::OFFER_TYPE];

    public function load(ObjectManager $manager)
    {
        foreach (self::TAGS as $tagName => $category) {
            $tag = (new Tags())
                ->setTag($tagName);
                $tag->setCategory($this->getReference($category));
            if($tagName == "FullStack"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_2));

            } else if($tagName == "Front"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3));
            } else if($tagName == "BackEnd"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_1));

            } else if($tagName == "Java"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_2));
            } else if($tagName == "JavaScript"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3));
            } else if($tagName == "CSS"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3));
            } else if($tagName == "Kotlin"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1));
            } else if($tagName == "C#") {
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2));
            }else if ($tagName == "Python"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE6_1));
            } else if($tagName == "Télétravail"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2));
            } else if($tagName == "Stage"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE3_2));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE5_2));
            } else if($tagName == "Alternance"){
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_1));
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE4_2));
            }
            $manager->getRepository(Tags::class)->save($tag, true);

        }
    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class,
            CategoryFixtures::class
        ];
    }
}