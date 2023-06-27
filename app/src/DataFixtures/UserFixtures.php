<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture {
    public const USER1 = 'user1';
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface  $passwordHasher)
    {
        $this->hasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = (new User())
            ->setEmail("enterprise1@mail.com")
            ->setIsVerified(true)
            ->setImageFilename("test")
            ->setRoles(["ROLE_ENTERPRISE"]);
        $user->setPassword($this->hasher->hashPassword($user, 'user1'));
        $this->addReference(self::USER1, $user);
        $manager->getRepository(User::class)->save($user, true);
    }
}