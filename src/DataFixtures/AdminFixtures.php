<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture

{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher) 

    {

        $this->passwordHasher = $passwordHasher;

    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();

        $admin->setUsername('admin');

        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword('admin');

        $hashedPassword = $this->passwordHasher->hashPassword(

            $admin,

            'admin'

        );

        $admin->setPassword($hashedPassword);
        $manager->persist($admin);
        $manager->flush();
    }
}
