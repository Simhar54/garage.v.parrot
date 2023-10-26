<?php

namespace App\Naming;

use App\Entity\CarImage;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;

class CarImageNamer implements NamerInterface
{
    public function name($object, PropertyMapping $mapping): string
    {
        /** @var CarImage $object */
        $car = $object->getCar();
        $brand = $car->getBrand();
        $model = $car->getModel();
        $year = $car->getYear();
        
        // Get the file extension from the original file name
        $file = $object->getImageFile(); 
        $extension = $file->guessExtension();

        // Create a unique name for the file
        $fileName = sprintf('%s_%s_%s_%s.%s',$year, $brand, $model, uniqid(), $extension);

        return $fileName;
    }
}
