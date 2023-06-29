<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture implements DependentFixtureInterface
{
    public const  TAGS = ["Dev FullStack"=>"Metier", "Dev Front"=>"Metier", "Dev BackEnd"=>"Metier",
        "Designer"=>"Metier", "Administrateur réseaux"=>"Metier",  "Technicien de maintenance"=>"Metier",
        "Java"=>"Langage", "JavaScript"=>"Langage", "CSS"=>"Langage","PHP"=>"Langage", "Python"=>"Langage",
        "C#"=>"Langage", "C"=>"Langage", "Ruby"=>"Langage", "Rust"=>"Langage", "Cobol"=>"Langage",
        "Petite", "Moyenne", "Grande",
        "Télétravail"=>"Condition", "De nuit"=>"Condition"];

    public function load(ObjectManager $manager)
    {
        foreach (self::TAGS as $tagName => $category) {
            $tag = (new Tags())
                ->setTag($tagName);
            $tag->setCategory($category);
            if($tagName == "JavaScript" || $tagName == "Java" || $tagName == "Dev FullStack" || $tagName == "Petite") {
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE2_1));
            } else if($tagName == "Dev BackEnd" || $tagName == "C" || $tagName == "Moyenne") {
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_1));
            } else if($tagName == "Dev Front" || $tagName == "Dev Front" || $tagName == "Ruby" || $tagName == "Grande") {
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_2));
            } else {
                $tag->addOffer($this->getReference(OffersFixtures::OFFER_ENTERPRISE1_3));
            }
            $manager->getRepository(Tags::class)->save($tag, true);

        }
    }

    public function getDependencies()
    {
        return [
            OffersFixtures::class
        ];
    }
}