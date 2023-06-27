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
    public const USER_STUDENT1 = 'user_student1';
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

        $userEtu = (new User())
            ->setEmail("etu1@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu->setPassword($this->hasher->hashPassword($userEtu, 'etu1'));
        $this->addReference(self::USER_STUDENT1, $userEtu);
        $this->setReference(self::USER_STUDENT1, $userEtu);
        $manager->getRepository(User::class)->save($userEtu, true);

        $userEtu = (new User())
            ->setEmail("etu2@mail.com")
            ->setIsVerified(true)
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu->setPassword($this->hasher->hashPassword($userEtu, 'etu2'));
        $this->addReference(self::USER_STUDENT1, $userEtu);
        $this->setReference(self::USER_STUDENT1, $userEtu);
        $manager->getRepository(User::class)->save($userEtu, true);
    }
}