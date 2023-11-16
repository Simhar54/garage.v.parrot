<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class G_Equipment extends Fixture
{
    public function load(ObjectManager $manager): void
    {   

        $nav = new \App\Entity\Equipment();
        $nav->setName('Système de navigation GPS intégré');
        $manager->persist($nav);

        $clim = new \App\Entity\Equipment();
        $clim->setName('Climatisation automatique bi-zone');
        $manager->persist($clim);

        $reg = new \App\Entity\Equipment();
        $reg->setName('Régulateur de vitesse adaptatif');
        $manager->persist($reg);

        $sieges = new \App\Entity\Equipment();
        $sieges->setName('Sièges chauffants en cuir');
        $manager->persist($sieges);

        $toit = new \App\Entity\Equipment();
        $toit->setName('Toit ouvrant électrique');
        $manager->persist($toit);

        $manager->flush();

        $this->addReference('nav', $nav);
        $this->addReference('clim', $clim);
        $this->addReference('reg', $reg);
        $this->addReference('sieges', $sieges);
    }
}
