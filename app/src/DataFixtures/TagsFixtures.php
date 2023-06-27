<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture
{
    public const  TAGS = ["Dev FullStack", "Dev Front", "Dev BackEnd", "Designer", "Administrateur réseaux",  "Technicien de maintenance",
        "Java", "JavaScript", "PHP", "Python", "C#", "C", "Ruby", "Rust", "Cobol",
        "Petite", "Moyenne", "Grande",
        "Télétravail", "De nuit"];

    public function load(ObjectManager $manager)
    {
        foreach (self::TAGS as $tagName) {

    }
    }
}