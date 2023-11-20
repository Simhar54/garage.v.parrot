<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Garage;

class GarageId
{
    private $garageName;
    private $entityManager;
    private $garageId;

    public function __construct($garageName, EntityManagerInterface $entityManager)
    {
        $this->garageName = $garageName;
        $this->entityManager = $entityManager;
        $this->garageId = $this->findGarageIdByName($garageName);
    }

    private function findGarageIdByName($garageName)
    {
        $garage = $this->entityManager->getRepository(Garage::class)->findOneBy(['name' => $garageName]);

        if ($garage) {
            return $garage->getId();
        }

    }

    public function getGarageId()
    {
        return $this->garageId;
    }
}
