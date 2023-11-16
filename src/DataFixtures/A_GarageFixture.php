<?php

namespace App\DataFixtures;

use App\Entity\Garage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class A_GarageFixture extends Fixture
{
 
    public function load(ObjectManager $manager): void
    {
        $garage = new Garage();
        $garage->setName("Garage V Parrot");
        $manager->persist($garage);
        $manager->flush();

        $this->addReference('garage-v-parrot', $garage);
    }
}
