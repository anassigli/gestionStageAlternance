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

        $userEnterprise4 = (new User())
            ->setEmail("enterprise4@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise2->setPassword($this->hasher->hashPassword($userEnterprise2, 'enterprise4'));
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
    }
}