<?php

namespace App\DataFixtures;

use App\Entity\OpeningHour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class E_OpeningHourFixture extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $garage = $this->getReference('garage-v-parrot');


        $openingHour = new OpeningHour();
        $openingHour->setMondayOpen(new \DateTime('08:00:00'));
        $openingHour->setMondayClose(new \DateTime('12:00:00'));
        $openingHour->setTuesdayOpen(new \DateTime('08:00:00'));
        $openingHour->setTuesdayClose(new \DateTime('12:00:00'));
        $openingHour->setWednesdayOpen(new \DateTime('08:00:00'));
        $openingHour->setWednesdayClose(new \DateTime('12:00:00'));
        $openingHour->setThursdayOpen(new \DateTime('08:00:00'));
        $openingHour->setThursdayClose(new \DateTime('12:00:00'));
        $openingHour->setFridayOpen(new \DateTime('08:00:00'));
        $openingHour->setFridayClose(new \DateTime('12:00:00'));
        $openingHour->setSaturdayOpen(new \DateTime('08:00:00'));
        $openingHour->setSaturdayClose(new \DateTime('12:00:00'));
        $openingHour->setSundayOpen(new \DateTime('08:00:00'));
        $openingHour->setSundayClose(new \DateTime('12:00:00'));
        $openingHour->setGarage($garage);
        $manager->persist($openingHour);

        $manager->flush();
    }
}
