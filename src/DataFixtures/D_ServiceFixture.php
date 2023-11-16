<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class D_ServiceFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $entretien = $this->getReference('entretien');
        $electrique = $this->getReference('electrique');
        $carrosserie = $this->getReference('carrosserie');
    

        // service entretien
        $vidange = new Service();
        $vidange->setName('Vidange d\'huile et changement de filtre');
        $vidange->setPrice(50);
        $vidange->setServiceCategory($entretien);
        $manager->persist($vidange);

        $freins = new Service();
        $freins->setName('Réparation et remplacement de freins');
        $freins->setPrice(100);
        $freins->setServiceCategory($entretien);
        $manager->persist($freins);

        $climatisation = new Service();
        $climatisation->setName('Contrôle et recharge de climatisation');
        $climatisation->setPrice(80);
        $climatisation->setServiceCategory($entretien);
        $manager->persist($climatisation);

        $courroie = new Service();
        $courroie->setName('Remplacement de courroie de distribution');
        $courroie->setPrice(200);
        $courroie->setServiceCategory($entretien);
        $manager->persist($courroie);

        $moteur = new Service();
        $moteur->setName('Diagnostic et réparation du moteur');
        $moteur->setPrice(300);
        $moteur->setServiceCategory($entretien);
        $manager->persist($moteur);

        //service electrique
        $batterie = new Service();
        $batterie->setName('Remplacement de batterie');
        $batterie->setPrice(100);
        $batterie->setServiceCategory($electrique);
        $manager->persist($batterie);

        $navigation = new Service();
        $navigation->setName('Installation et réparation de systèmes de navigation et audio');
        $navigation->setPrice(200);
        $navigation->setServiceCategory($electrique);
        $manager->persist($navigation);

        $eclairage = new Service();
        $eclairage->setName('Réparation de systèmes d\'éclairage');
        $eclairage->setPrice(100);
        $eclairage->setServiceCategory($electrique);
        $manager->persist($eclairage);

        $ecu = new Service();
        $ecu->setName('Programmation d\'ECU et mise à jour du logiciel');
        $ecu->setPrice(300);
        $ecu->setServiceCategory($electrique);
        $manager->persist($ecu);

        //service carrosserie
        $lavage = new Service();
        $lavage->setName('Lavage et polissage');
        $lavage->setPrice(50);
        $lavage->setServiceCategory($carrosserie);
        $manager->persist($lavage);

        $rayures = new Service();
        $rayures->setName('Réparation de petits impacts et rayures');
        $rayures->setPrice(100);
        $rayures->setServiceCategory($carrosserie);
        $manager->persist($rayures);

        $parebrise = new Service();
        $parebrise->setName('Remplacement de pare-brise');
        $parebrise->setPrice(200);
        $parebrise->setServiceCategory($carrosserie);
        $manager->persist($parebrise);

        $antirouille = new Service();
        $antirouille->setName('Traitement antirouilles');
        $antirouille->setPrice(100);
        $antirouille->setServiceCategory($carrosserie);
        $manager->persist($antirouille);

        $phares = new Service();
        $phares->setName('Restauration des phares');
        $phares->setPrice(300);
        $phares->setServiceCategory($carrosserie);
        $manager->persist($phares);

        $manager->flush();
    }
}
