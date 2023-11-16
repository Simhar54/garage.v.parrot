<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class B_UserFixture extends Fixture
{
 
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
    ) {
    }

    public function load(ObjectManager $manager): void
    {

        $garage = $this->getReference('garage-v-parrot');

        $admin = new User();
        $admin->setEmail('admin@demo.fr');
        $admin->setLastname('Admin');
        $admin->setFirstname('Admin');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'Admin123456.'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setGarage($garage);
        $admin->setCreatedAt(new \DateTimeImmutable());
        $admin->setFirstTimeLogin(false);
        $manager->persist($admin);

        $employee = new User();
        $employee->setEmail('employee@demo.fr');
        $employee->setLastname('Employee');
        $employee->setFirstname('Employee');
        $employee->setPassword($this->passwordEncoder->hashPassword($employee, 'Employee123456.'));
        $employee->setRoles(['ROLE_EMPLOYEE']);
        $employee->setGarage($garage);
        $employee->setCreatedAt(new \DateTimeImmutable());
        $employee->setFirstTimeLogin(false);
        $manager->persist($employee);


        $manager->flush();

        $this->addReference('admin', $admin);
    }
}
