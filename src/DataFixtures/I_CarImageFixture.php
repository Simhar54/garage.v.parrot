<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class I_CarImageFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Car Reference
        $F500 = $this->getReference('F500');
        $AMG = $this->getReference('AMG');
        $Arkana = $this->getReference('Arkana');
        $Guilia = $this->getReference('Guilia');
        $Wrangler = $this->getReference('Wrangler');

        $F5001 = new \App\Entity\CarImage();
        $F5001->setImagePath('5001.jpg');
        $F5001->setCar($F500);
        $manager->persist($F5001);

        $F5002 = new \App\Entity\CarImage();
        $F5002->setImagePath('5002.jpg');
        $F5002->setCar($F500);
        $manager->persist($F5002);

        $F5003 = new \App\Entity\CarImage();
        $F5003->setImagePath('5003.jpg');
        $F5003->setCar($F500);
        $manager->persist($F5003);

        $AMG1 = new \App\Entity\CarImage();
        $AMG1->setImagePath('AMG1.jpg');
        $AMG1->setCar($AMG);
        $manager->persist($AMG1);

        $AMG2 = new \App\Entity\CarImage();
        $AMG2->setImagePath('AMG2.jpg');
        $AMG2->setCar($AMG);
        $manager->persist($AMG2);

        $AMG3 = new \App\Entity\CarImage();
        $AMG3->setImagePath('AMG3.jpeg');
        $AMG3->setCar($AMG);
        $manager->persist($AMG3);

        $Arkana1 = new \App\Entity\CarImage();
        $Arkana1->setImagePath('Arkana1.jpeg');
        $Arkana1->setCar($Arkana);
        $manager->persist($Arkana1);

        $Arkana2 = new \App\Entity\CarImage();
        $Arkana2->setImagePath('Arkana2.jpg');
        $Arkana2->setCar($Arkana);
        $manager->persist($Arkana2);

        $Arkana3 = new \App\Entity\CarImage();
        $Arkana3->setImagePath('Arkana3.jpeg');
        $Arkana3->setCar($Arkana);
        $manager->persist($Arkana3);

        $Guilia1 = new \App\Entity\CarImage();
        $Guilia1->setImagePath('Guilia1.jpeg');
        $Guilia1->setCar($Guilia);
        $manager->persist($Guilia1);

        $Guilia2 = new \App\Entity\CarImage();
        $Guilia2->setImagePath('Guilia2.jpg');
        $Guilia2->setCar($Guilia);
        $manager->persist($Guilia2);

        $Guilia3 = new \App\Entity\CarImage();
        $Guilia3->setImagePath('Guilia3.jpeg');
        $Guilia3->setCar($Guilia);
        $manager->persist($Guilia3);

        $Wrangler1 = new \App\Entity\CarImage();
        $Wrangler1->setImagePath('Wrangler1.webp');
        $Wrangler1->setCar($Wrangler);
        $manager->persist($Wrangler1);

        $Wrangler2 = new \App\Entity\CarImage();
        $Wrangler2->setImagePath('Wrangler2.jpeg');
        $Wrangler2->setCar($Wrangler);
        $manager->persist($Wrangler2);
        
        $Wrangler3 = new \App\Entity\CarImage();
        $Wrangler3->setImagePath('Wrangler3.jpeg');
        $Wrangler3->setCar($Wrangler);
        $manager->persist($Wrangler3);


        $manager->flush();
    }
}
