<?php

namespace App\Service;

namespace App\Service;

class GarageId
{
    private $garageId;

    public function __construct($garageId)
    {
        $this->garageId = $garageId;
    }

  
    public function getGarageId()
    {
        return $this->garageId;
    }
}
