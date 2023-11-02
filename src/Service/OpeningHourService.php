<?php

namespace App\Service;

use App\Repository\OpeningHourRepository;

class OpeningHourService 
{
    private $openingHourRepository;

    public function __construct(OpeningHourRepository $openingHourRepository)
    {
        $this->openingHourRepository = $openingHourRepository;
    }

    public function getOpeningHour()
    {
        $openingHour = $this->openingHourRepository->findOneBy([]);
    
        $formatted = [];
    
        $formatted['Lundi'] = $this->formatDay($openingHour->getMondayOpen(), $openingHour->getMondayClose());
        $formatted['Mardi'] = $this->formatDay($openingHour->getTuesdayOpen(), $openingHour->getTuesdayClose());
        $formatted['Mercredi'] = $this->formatDay($openingHour->getWednesdayOpen(), $openingHour->getWednesdayClose());
        $formatted['Jeudi'] = $this->formatDay($openingHour->getThursdayOpen(), $openingHour->getThursdayClose());
        $formatted['Vendredi'] = $this->formatDay($openingHour->getFridayOpen(), $openingHour->getFridayClose());
        $formatted['Samedi'] = $this->formatDay($openingHour->getSaturdayOpen(), $openingHour->getSaturdayClose());
        $formatted['Dimanche'] = $this->formatDay($openingHour->getSundayOpen(), $openingHour->getSundayClose());
    
        return $formatted;
    }
    
    private function formatDay($open, $close)
    {
        if ($open->format('H:i') === '00:00' && $close->format('H:i') === '00:00') {
            return 'Fermé';
        }
    
        return $open->format('H:i') . " - " . $close->format('H:i');
    }
        

    
}
