<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture implements DependentFixtureInterface
{
    public const  TAGS = ["Dev FullStack", "Dev Front", "Dev BackEnd", "Designer", "Administrateur réseaux",  "Technicien de maintenance",
        "Java", "JavaScript", "CSS","PHP", "Python", "C#", "C", "Ruby", "Rust", "Cobol",
        "Petite", "Moyenne", "Grande",
        "Télétravail", "De nuit"];

    public function load(ObjectManager $manager)
    {
        foreach (self::TAGS as $tagName) {
            $tag = (new Tags())
                ->setTag($tagName);
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