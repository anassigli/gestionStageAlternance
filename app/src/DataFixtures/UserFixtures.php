<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture {

    public const USER_ADMIN = 'admin';
    public const USER_ENTERPRISE1 = 'user_enterprise1';
    public const USER_ENTERPRISE2 = 'user_enterprise2';
    public const USER_ENTERPRISE3 = 'user_enterprise3';
    public const USER_ENTERPRISE4 = 'user_enterprise4';
    public const USER_ENTERPRISE5 = 'user_enterprise5';
    public const USER_STUDENT1 = 'user_student1';
    public const USER_STUDENT2 = 'user_student2';
    public const USER_STUDENT3 = 'user_student3';
    public const USER_STUDENT4 = 'user_student4';
    public const USER_STUDENT5 = 'user_student5';
    public const USER_STUDENT6 = 'user_student6';
    public const USER_STUDENT7 = 'user_student7';
    public const USER_STUDENT8 = 'user_student8';
    public const USER_STUDENT9 = 'user_student9';
    public const USER_STUDENT10 = 'user_student10';
    public const USER_STUDENT11 = 'user_student11';
    public const USER_STUDENT12 = 'user_student12';
    public const USER_STUDENT13 = 'user_student13';
    public const USER_STUDENT14 = 'user_student14';
    public const USER_STUDENT15 = 'user_student15';
    public const USER_STUDENT16 = 'user_student16';


    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface  $passwordHasher)
    {
        $this->hasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $userAdm = (new User())
            ->setEmail("admin@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ADMIN"]);
        $userAdm->setPassword($this->hasher->hashPassword($userAdm, 'admin'));
        $this->addReference(self::USER_ADMIN, $userAdm);
        $this->setReference(self::USER_ADMIN, $userAdm);
        $manager->getRepository(User::class)->save($userAdm, true);

        $userEnterprise1 = (new User())
            ->setEmail("enterprise1@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise1->setPassword($this->hasher->hashPassword($userEnterprise1, 'user1'));
        $this->addReference(self::USER_ENTERPRISE1, $userEnterprise1);
        $this->setReference(self::USER_ENTERPRISE1, $userEnterprise1);
        $manager->getRepository(User::class)->save($userEnterprise1, true);

        $userEnterprise2 = (new User())
            ->setEmail("enterprise2@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise2->setPassword($this->hasher->hashPassword($userEnterprise2, 'enterprise2'));
        $this->addReference(self::USER_ENTERPRISE2, $userEnterprise2);
        $this->setReference(self::USER_ENTERPRISE2, $userEnterprise2);
        $manager->getRepository(User::class)->save($userEnterprise2, true);

        $userEnterprise3 = (new User())
            ->setEmail("enterprise3@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise3->setPassword($this->hasher->hashPassword($userEnterprise3, 'enterprise3'));
        $this->addReference(self::USER_ENTERPRISE3, $userEnterprise3);
        $this->setReference(self::USER_ENTERPRISE3, $userEnterprise3);
        $manager->getRepository(User::class)->save($userEnterprise3, true);

        $userEnterprise4 = (new User())
            ->setEmail("enterprise4@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise4->setPassword($this->hasher->hashPassword($userEnterprise4, 'enterprise4'));
        $this->addReference(self::USER_ENTERPRISE4, $userEnterprise4);
        $this->setReference(self::USER_ENTERPRISE4, $userEnterprise4);
        $manager->getRepository(User::class)->save($userEnterprise4, true);

        $userEtu1 = (new User())
            ->setEmail("etu1@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu1->setPassword($this->hasher->hashPassword($userEtu1, 'etu1'));
        $this->addReference(self::USER_STUDENT1, $userEtu1);
        $this->setReference(self::USER_STUDENT1, $userEtu1);
        $manager->getRepository(User::class)->save($userEtu1, true);

        $userEtu2 = (new User())
            ->setEmail("etu2@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu2->setPassword($this->hasher->hashPassword($userEtu2, 'etu2'));
        $this->addReference(self::USER_STUDENT2, $userEtu2);
        $this->setReference(self::USER_STUDENT2, $userEtu2);
        $manager->getRepository(User::class)->save($userEtu2, true);

        $userEtu3 = (new User())
            ->setEmail("etu3@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu3->setPassword($this->hasher->hashPassword($userEtu3, 'etu3'));
        $this->addReference(self::USER_STUDENT3, $userEtu3);
        $this->setReference(self::USER_STUDENT3, $userEtu3);
        $manager->getRepository(User::class)->save($userEtu3, true);

        $userEtu4 = (new User())
            ->setEmail("etu4@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu4->setPassword($this->hasher->hashPassword($userEtu4, 'etu4'));
        $this->addReference(self::USER_STUDENT4, $userEtu4);
        $this->setReference(self::USER_STUDENT4, $userEtu4);
        $manager->getRepository(User::class)->save($userEtu4, true);

        $userEtu5 = (new User())
            ->setEmail("etu5@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu5->setPassword($this->hasher->hashPassword($userEtu5, 'etu5'));
        $this->addReference(self::USER_STUDENT5, $userEtu5);
        $this->setReference(self::USER_STUDENT5, $userEtu5);
        $manager->getRepository(User::class)->save($userEtu5, true);

        $userEtu6 = (new User())
            ->setEmail("etu6@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu6->setPassword($this->hasher->hashPassword($userEtu6, 'etu6'));
        $this->addReference(self::USER_STUDENT6, $userEtu6);
        $this->setReference(self::USER_STUDENT6, $userEtu6);
        $manager->getRepository(User::class)->save($userEtu6, true);

        $userEtu7 = (new User())
            ->setEmail("etu7@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu7->setPassword($this->hasher->hashPassword($userEtu7, 'etu7'));
        $this->addReference(self::USER_STUDENT7, $userEtu7);
        $this->setReference(self::USER_STUDENT7, $userEtu7);
        $manager->getRepository(User::class)->save($userEtu7, true);

        $userEtu8 = (new User())
            ->setEmail("etu8@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu8->setPassword($this->hasher->hashPassword($userEtu8, 'etu8'));
        $this->addReference(self::USER_STUDENT8, $userEtu8);
        $this->setReference(self::USER_STUDENT8, $userEtu8);
        $manager->getRepository(User::class)->save($userEtu8, true);

        $userEtu9 = (new User())
            ->setEmail("etu9@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu9->setPassword($this->hasher->hashPassword($userEtu9, 'etu9'));
        $this->addReference(self::USER_STUDENT9, $userEtu9);
        $this->setReference(self::USER_STUDENT9, $userEtu9);
        $manager->getRepository(User::class)->save($userEtu9, true);

        $userEtu10 = (new User())
            ->setEmail("etu10@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu10->setPassword($this->hasher->hashPassword($userEtu10, 'etu10'));
        $this->addReference(self::USER_STUDENT10, $userEtu10);
        $this->setReference(self::USER_STUDENT10, $userEtu10);
        $manager->getRepository(User::class)->save($userEtu10, true);

        $userEtu11 = (new User())
            ->setEmail("etu11@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu11->setPassword($this->hasher->hashPassword($userEtu11, 'etu11'));
        $this->addReference(self::USER_STUDENT11, $userEtu11);
        $this->setReference(self::USER_STUDENT11, $userEtu11);
        $manager->getRepository(User::class)->save($userEtu11, true);

        $userEtu12 = (new User())
            ->setEmail("etu12@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu12->setPassword($this->hasher->hashPassword($userEtu12, 'etu12'));
        $this->addReference(self::USER_STUDENT12, $userEtu12);
        $this->setReference(self::USER_STUDENT12, $userEtu12);
        $manager->getRepository(User::class)->save($userEtu12, true);

        $userEtu13 = (new User())
            ->setEmail("etu13@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu13->setPassword($this->hasher->hashPassword($userEtu13, 'etu13'));
        $this->addReference(self::USER_STUDENT13, $userEtu13);
        $this->setReference(self::USER_STUDENT13, $userEtu13);
        $manager->getRepository(User::class)->save($userEtu13, true);

        $userEtu14 = (new User())
            ->setEmail("etu14@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu14->setPassword($this->hasher->hashPassword($userEtu14, 'etu14'));
        $this->addReference(self::USER_STUDENT14, $userEtu14);
        $this->setReference(self::USER_STUDENT14, $userEtu14);
        $manager->getRepository(User::class)->save($userEtu14, true);

        $userEtu15 = (new User())
            ->setEmail("etu15@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu15->setPassword($this->hasher->hashPassword($userEtu15, 'etu15'));
        $this->addReference(self::USER_STUDENT15, $userEtu15);
        $this->setReference(self::USER_STUDENT15, $userEtu15);
        $manager->getRepository(User::class)->save($userEtu15, true);

        $userEtu16 = (new User())
            ->setEmail("etu16@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu16->setPassword($this->hasher->hashPassword($userEtu16, 'etu16'));
        $this->addReference(self::USER_STUDENT16, $userEtu16);
        $this->setReference(self::USER_STUDENT16, $userEtu16);
        $manager->getRepository(User::class)->save($userEtu16, true);
    }
}