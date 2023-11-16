<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class F_Option extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $secu = new \App\Entity\Option();
        $secu->setName('Pack sécurité avancée');
        $manager->persist($secu);

        $audio = new \App\Entity\Option();
        $audio->setName('Système audio premium avec subwoofer');
        $manager->persist($audio);

        $peinture = new \App\Entity\Option();
        $peinture->setName('Peinture métallisée spéciale');
        $manager->persist($peinture);

        $jantes = new \App\Entity\Option();
        $jantes->setName('Jantes alliage 18 pouces');
        $manager->persist($jantes);
        

        $manager->flush();

        $this->addReference('secu', $secu);
        $this->addReference('audio', $audio);
        $this->addReference('peinture', $peinture);
        $this->addReference('jantes', $jantes);
        
    }
}
