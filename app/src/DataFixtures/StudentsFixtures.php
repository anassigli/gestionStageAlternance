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
    public const STUDENT3 = 'student3';
    public const STUDENT4 = 'student4';
    public const STUDENT5 = 'student5';
    public const STUDENT6 = 'student6';
    public const STUDENT7 = 'student7';
    public const STUDENT8 = 'student8';
    public const STUDENT9 = 'student9';
    public const STUDENT10 = 'student10';
    public const STUDENT11 = 'student11';
    public const STUDENT12 = 'student12';
    public const STUDENT13 = 'student13';
    public const STUDENT14 = 'student14';
    public const STUDENT15 = 'student15';
    public const STUDENT16 = 'student16';
    public function load(ObjectManager $manager)
    {
        $student1 = (new Student())
            ->setEmail("etu1@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT1))
            ->setFirstname("Robert")
            ->setCv("CV-Baptiste-Chabrol.pdf")
            ->setLastname("Marcoux");
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

        $student3 = (new Student())
            ->setEmail("etu3@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT3))
            ->setFirstname("Jérôme")
            ->setLastname("Duranseau");
        $this->addReference(self::STUDENT3, $student3);
        $this->setReference(self::STUDENT3, $student3);
        $manager->getRepository(Student::class)->save($student3, true);

        $student4 = (new Student())
            ->setEmail("etu4@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT4))
            ->setFirstname("Pascal")
            ->setLastname("Dupuy");
        $this->addReference(self::STUDENT4, $student4);
        $this->setReference(self::STUDENT4, $student4);
        $manager->getRepository(Student::class)->save($student4, true);

        $student5 = (new Student())
            ->setEmail("etu5@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT5))
            ->setFirstname("Guerin")
            ->setLastname("Lanteigne");
        $this->addReference(self::STUDENT5, $student5);
        $this->setReference(self::STUDENT5, $student5);
        $manager->getRepository(Student::class)->save($student5, true);

        $student6 = (new Student())
            ->setEmail("etu6@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT6))
            ->setFirstname("Melville")
            ->setLastname("Brochu");
        $this->addReference(self::STUDENT6, $student6);
        $this->setReference(self::STUDENT6, $student6);
        $manager->getRepository(Student::class)->save($student6, true);

        $student7 = (new Student())
            ->setEmail("etu7@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT7))
            ->setFirstname("Somer")
            ->setLastname("Boileau");
        $this->addReference(self::STUDENT7, $student7);
        $this->setReference(self::STUDENT7, $student7);
        $manager->getRepository(Student::class)->save($student7, true);

        $student8 = (new Student())
            ->setEmail("etu8@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT8))
            ->setFirstname("Denis")
            ->setLastname("Bourgeau");
        $this->addReference(self::STUDENT8, $student8);
        $this->setReference(self::STUDENT8, $student8);
        $manager->getRepository(Student::class)->save($student8, true);

        $student9 = (new Student())
            ->setEmail("etu9@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT9))
            ->setFirstname("Pomeroy")
            ->setLastname("Pelletier");
        $this->addReference(self::STUDENT9, $student9);
        $this->setReference(self::STUDENT9, $student9);
        $manager->getRepository(Student::class)->save($student9, true);

        $student10 = (new Student())
            ->setEmail("etu10@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT10))
            ->setFirstname("David")
            ->setLastname("Lampron");
        $this->addReference(self::STUDENT10, $student10);
        $this->setReference(self::STUDENT10, $student10);
        $manager->getRepository(Student::class)->save($student10, true);

        $student11 = (new Student())
            ->setEmail("etu11@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT11))
            ->setFirstname("Curtis")
            ->setLastname("Lauzier");
        $this->addReference(self::STUDENT11, $student11);
        $this->setReference(self::STUDENT11, $student11);
        $manager->getRepository(Student::class)->save($student11, true);

        $student12 = (new Student())
            ->setEmail("etu12@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT12))
            ->setFirstname("Alphonse")
            ->setLastname("Garcia");
        $this->addReference(self::STUDENT12, $student12);
        $this->setReference(self::STUDENT12, $student12);
        $manager->getRepository(Student::class)->save($student12, true);

        $student13 = (new Student())
            ->setEmail("etu13@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT13))
            ->setFirstname("Philip")
            ->setLastname("Gousse");
        $this->addReference(self::STUDENT13, $student13);
        $this->setReference(self::STUDENT13, $student13);
        $manager->getRepository(Student::class)->save($student13, true);

        $student14 = (new Student())
            ->setEmail("etu14@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT14))
            ->setFirstname("Arno")
            ->setLastname("Bousquet");
        $this->addReference(self::STUDENT14, $student14);
        $this->setReference(self::STUDENT14, $student14);
        $manager->getRepository(Student::class)->save($student14, true);

        $student15 = (new Student())
            ->setEmail("etu15@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT15))
            ->setFirstname("Octave")
            ->setLastname("Grivois");
        $this->addReference(self::STUDENT15, $student15);
        $this->setReference(self::STUDENT15, $student15);
        $manager->getRepository(Student::class)->save($student15, true);

        $student16 = (new Student())
            ->setEmail("etu16@mail.com")
            ->setUser($this->getReference(UserFixtures::USER_STUDENT16))
            ->setFirstname("Fabien")
            ->setLastname("Lauzier");
        $this->addReference(self::STUDENT16, $student16);
        $this->setReference(self::STUDENT16, $student16);
        $manager->getRepository(Student::class)->save($student16, true);

    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}