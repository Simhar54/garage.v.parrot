<?php

namespace App\DataFixtures;

use App\Entity\Testimony;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class J_TestimonyFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //garage reference
        $garage = $this->getReference('garage-v-parrot');


        $testimony1 = new Testimony();
        $testimony1->setLastname('L.');
        $testimony1->setFirstname('Sophie');
        $testimony1->setMessage('Un service impeccable du début à la fin. L\'équipe a pris le temps de m\'expliquer le problème avec ma voiture et les options de réparation. Je suis très satisfaite et recommande vivement ce garage !');
        $testimony1->setRating(5);
        $testimony1->setCreatedAt(new \DateTimeImmutable());
        $testimony1->setIsModerated(true);
        $testimony1->setGarage($garage);
        $manager->persist($testimony1);

        $testimony2 = new Testimony();
        $testimony2->setLastname('D.');
        $testimony2->setFirstname('Alexandre');
        $testimony2->setMessage('Très bon garage, tarifs raisonnables et personnel compétent. J\'aurais aimé un peu plus de rapidité dans le service, mais sinon, tout était parfait.');
        $testimony2->setRating(4);
        $testimony2->setCreatedAt(new \DateTimeImmutable());
        $testimony2->setIsModerated(true);
        $testimony2->setGarage($garage);
        $manager->persist($testimony2);

        $testimony3 = new Testimony();
        $testimony3->setLastname('T.');
        $testimony3->setFirstname('Émilie');
        $testimony3->setMessage('Je ne suis pas du tout experte en voiture, mais l\'équipe du garage a su me mettre à l\'aise et m\'expliquer clairement les réparations nécessaires. Le prêt d\'une voiture de courtoisie pendant les réparations était un plus très apprécié !');
        $testimony3->setRating(5);
        $testimony3->setCreatedAt(new \DateTimeImmutable());
        $testimony3->setIsModerated(true);
        $testimony3->setGarage($garage);
        $manager->persist($testimony3);

        $testimony4 = new Testimony();
        $testimony4->setLastname('M.');
        $testimony4->setFirstname('François');
        $testimony4->setMessage('Excellent service client et très bon suivi. Les réparations ont été effectuées dans les délais et pour un prix raisonnable. J\'enlève une demi-étoile car le garage était un peu difficile à trouver, mais sinon, c\'était top.');
        $testimony4->setRating(3);
        $testimony4->setCreatedAt(new \DateTimeImmutable());
        $testimony4->setIsModerated(true);
        $testimony4->setGarage($garage);
        $manager->persist($testimony4);


        $manager->flush();
    }
}
