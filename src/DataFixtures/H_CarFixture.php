<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class H_CarFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Employee
        $admin = $this->getReference('admin');
        //Option
        $secu = $this->getReference('secu');
        $audio = $this->getReference('audio');
        $peinture = $this->getReference('peinture');
        $jantes = $this->getReference('jantes');
        //Equipment
        $nav = $this->getReference('nav');
        $clim = $this->getReference('clim');
        $reg = $this->getReference('reg');
        $sieges = $this->getReference('sieges');

        $F500 = new \App\Entity\Car();
        $F500->setModel('500');
        $F500->setBrand('Fiat');
        $F500->setPrice(15000);
        $F500->setYear(2020);
        $F500->setMileage(12000);
        $F500->setEmployee($admin);
        $F500->setCreatedAt(new \DateTimeImmutable());
        $F500->addOption($secu);
        $F500->addOption($audio);
        $F500->addOption($peinture);
        $F500->addOption($jantes);
        $F500->addEquipment($nav);
        $F500->addEquipment($clim);
        $F500->addEquipment($reg);
        $F500->addEquipment($sieges);
        $manager->persist($F500);

        $AMG = new \App\Entity\Car();
        $AMG->setModel('AMG');
        $AMG->setBrand('Mercedes');
        $AMG->setPrice(25000);
        $AMG->setYear(2019);
        $AMG->setMileage(20000);
        $AMG->setEmployee($admin);
        $AMG->setCreatedAt(new \DateTimeImmutable());
        $AMG->addOption($secu);
        $AMG->addOption($audio);
        $AMG->addOption($peinture);
        $AMG->addOption($jantes);
        $AMG->addEquipment($nav);
        $AMG->addEquipment($clim);
        $AMG->addEquipment($reg);
        $AMG->addEquipment($sieges);
        $manager->persist($AMG);

        $Arkana = new \App\Entity\Car();
        $Arkana->setModel('Arkana');
        $Arkana->setBrand('Renault');
        $Arkana->setPrice(20000);
        $Arkana->setYear(2020);
        $Arkana->setMileage(15000);
        $Arkana->setEmployee($admin);
        $Arkana->setCreatedAt(new \DateTimeImmutable());
        $Arkana->addOption($secu);
        $Arkana->addOption($audio);
        $Arkana->addOption($peinture);
        $Arkana->addOption($jantes);
        $Arkana->addEquipment($nav);
        $Arkana->addEquipment($clim);
        $Arkana->addEquipment($reg);
        $Arkana->addEquipment($sieges);
        $manager->persist($Arkana);

        $Guilia = new \App\Entity\Car();
        $Guilia->setModel('Guilia');
        $Guilia->setBrand('Alfa Romeo');
        $Guilia->setPrice(30000);
        $Guilia->setYear(2020);
        $Guilia->setMileage(10000);
        $Guilia->setEmployee($admin);
        $Guilia->setCreatedAt(new \DateTimeImmutable());
        $Guilia->addOption($secu);
        $Guilia->addOption($audio);
        $Guilia->addOption($peinture);
        $Guilia->addOption($jantes);
        $Guilia->addEquipment($nav);
        $Guilia->addEquipment($clim);
        $Guilia->addEquipment($reg);
        $Guilia->addEquipment($sieges);
        $manager->persist($Guilia);

        $Wrangler = new \App\Entity\Car();
        $Wrangler->setModel('Wrangler');
        $Wrangler->setBrand('Jeep');
        $Wrangler->setPrice(35000);
        $Wrangler->setYear(2020);
        $Wrangler->setMileage(5000);
        $Wrangler->setEmployee($admin);
        $Wrangler->setCreatedAt(new \DateTimeImmutable());
        $Wrangler->addOption($secu);
        $Wrangler->addOption($audio);
        $Wrangler->addOption($peinture);
        $Wrangler->addOption($jantes);
        $Wrangler->addEquipment($nav);
        $Wrangler->addEquipment($clim);
        $Wrangler->addEquipment($reg);
        $Wrangler->addEquipment($sieges);
        $manager->persist($Wrangler);



       
        $manager->flush();

        $this->addReference('F500', $F500);
        $this->addReference('AMG', $AMG);
        $this->addReference('Arkana', $Arkana);
        $this->addReference('Guilia', $Guilia);
        $this->addReference('Wrangler', $Wrangler);
    }
}
