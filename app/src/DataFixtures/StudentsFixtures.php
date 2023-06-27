<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StudentsFixtures extends Fixture implements DependentFixtureInterface
{
    public const STUDENT1 = 'student1';
    public function load(ObjectManager $manager)
    {
        $student = (new Student())
            ->setEmail("etu1@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT1))
            ->setImageFilename("test")
            ->setFirstname("Toto")
            ->setLastname("Titi");
        $this->addReference(self::STUDENT1, $student);
        $this->setReference(self::STUDENT1, $student);
        $manager->getRepository(Student::class)->save($student, true);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}