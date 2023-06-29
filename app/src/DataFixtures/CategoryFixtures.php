<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const JOB = 'category job';
    public const LANGUAGE = 'category language';
    public const SIZE= 'category size';
    public const CONDITION = 'category condition';
    public const OFFER_TYPE = 'category offer_type';

    public function load(ObjectManager $manager)
    {
        $job = (new Category())
            ->setCategory("Travail");
        $language = (new Category())
            ->setCategory("Langage");
        $size = (new Category())
            ->setCategory("Taille de l'entreprise");
        $condition = (new Category())
            ->setCategory("Conditionde travail");
        $offer_type = (new Category())
            ->setCategory("Type d'offre");

        $this->addReference(self::JOB,$job);
        $this->addReference(self::LANGUAGE,$language);
        $this->addReference(self::SIZE,$size);
        $this->addReference(self::CONDITION,$condition);
        $this->addReference(self::OFFER_TYPE,$offer_type);

        $manager->getRepository(Category::class)->save($job, true);
        $manager->getRepository(Category::class)->save($language,true);
        $manager->getRepository(Category::class)->save($size,true);
        $manager->getRepository(Category::class)->save($condition,true);
        $manager->getRepository(Category::class)->save($offer_type,true);
    }
}