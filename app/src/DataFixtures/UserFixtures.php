<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture {

    public const USER_ADMIN = 'admin';
    public const USER_ENTERPRISE1 = 'user_enterprise1';
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
            ->setImageFilename("test")
            ->setRoles(["ROLE_ADMIN"]);
        $userAdm->setPassword($this->hasher->hashPassword($userAdm, 'admin'));
        $this->addReference(self::USER_ADMIN, $userAdm);
        $this->setReference(self::USER_ADMIN, $userAdm);
        $manager->getRepository(User::class)->save($userAdm, true);

        $userEnterprise = (new User())
            ->setEmail("enterprise1@mail.com")
            ->setIsVerified(true)
            ->setImageFilename("test")
            ->setRoles(["ROLE_ENTERPRISE"]);
        $userEnterprise->setPassword($this->hasher->hashPassword($userEnterprise, 'user1'));
        $this->addReference(self::USER_ENTERPRISE1, $userEnterprise);
        $this->setReference(self::USER_ENTERPRISE1, $userEnterprise);
        $manager->getRepository(User::class)->save($userEnterprise, true);

        $userEtu = (new User())
            ->setEmail("etu1@mail.com")
            ->setIsVerified(true)
            ->setImageFilename("test")
            ->setRoles(["ROLE_STUDENT"]);
        $userEtu->setPassword($this->hasher->hashPassword($userEtu, 'etu1'));
        $this->addReference(self::USER_STUDENT1, $userEtu);
        $this->setReference(self::USER_STUDENT1, $userEtu);
        $manager->getRepository(User::class)->save($userEtu, true);
    }
}