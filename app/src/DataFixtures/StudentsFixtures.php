<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StudentsFixtures extends Fixture implements DependentFixtureInterface
{
    public const STUDENT1 = 'student1';
    public const STUDENT2 = 'student2';
    public function load(ObjectManager $manager)
    {
        $student1 = (new Student())
            ->setEmail("etu1@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT1))
            ->setFirstname("Toto")
            ->setLastname("Titi");
        $this->addReference(self::STUDENT1, $student1);
        $this->setReference(self::STUDENT1, $student1);
        $manager->getRepository(Student::class)->save($student1, true);

        $student2 = (new Student())
            ->setEmail("etu2@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT2))
            ->setFirstname("Mathis")
            ->setLastname("Dupont");
        $this->addReference(self::STUDENT2, $student2);
        $this->setReference(self::STUDENT2, $student2);
        $manager->getRepository(Student::class)->save($student2, true);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}