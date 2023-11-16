<?php

namespace App\DataFixtures;

use App\Entity\ServiceCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class C_ServiceCategoryFixtures extends Fixture
{
   
    public function load(ObjectManager $manager): void
    {   
        $garage = $this->getReference('garage-v-parrot');

        $entretien = new ServiceCategory();
        $entretien->setName('Entretien et réparation mécannique');
        $entretien->setGarage($garage);
        $manager->persist($entretien);

        $electrique = new ServiceCategory();
        $electrique->setName('Services Électriques et Électroniques');
        $electrique->setGarage($garage);
        $manager->persist($electrique);

        $carrosserie = new ServiceCategory();
        $carrosserie->setName('Carrosserie et Esthétique');
        $carrosserie->setGarage($garage);
        $manager->persist($carrosserie);  


        $manager->flush();


        $this->addReference('entretien', $entretien);
        $this->addReference('electrique', $electrique);
        $this->addReference('carrosserie', $carrosserie);
    }
}
