<?php

namespace App\Entity;

use App\Repository\OpeningHourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OpeningHourRepository::class)]
class OpeningHour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $monday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $monday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $tuesday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $tuesday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $wednesday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $wednesday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $thursday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $thursday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $friday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $friday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $saturday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $saturday_close = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $sunday_open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une heure d\'ouverture')]
    #[Assert\Time(message: 'Veuillez renseigner une heure valide')]
    private ?\DateTimeInterface $sunday_close = null;

    #[ORM\OneToOne(inversedBy: 'openingHour', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMondayOpen(): ?\DateTimeInterface
    {
        return $this->monday_open;
    }

    public function setMondayOpen(\DateTimeInterface $monday_open): static
    {
        $this->monday_open = $monday_open;

        return $this;
    }

    public function getMondayClose(): ?\DateTimeInterface
    {
        return $this->monday_close;
    }

    public function setMondayClose(\DateTimeInterface $monday_close): static
    {
        $this->monday_close = $monday_close;

        return $this;
    }

    public function getTuesdayOpen(): ?\DateTimeInterface
    {
        return $this->tuesday_open;
    }

    public function setTuesdayOpen(\DateTimeInterface $tuesday_open): static
    {
        $this->tuesday_open = $tuesday_open;

        return $this;
    }

    public function getTuesdayClose(): ?\DateTimeInterface
    {
        return $this->tuesday_close;
    }

    public function setTuesdayClose(\DateTimeInterface $tuesday_close): static
    {
        $this->tuesday_close = $tuesday_close;

        return $this;
    }

    public function getWednesdayOpen(): ?\DateTimeInterface
    {
        return $this->wednesday_open;
    }

    public function setWednesdayOpen(\DateTimeInterface $wednesday_open): static
    {
        $this->wednesday_open = $wednesday_open;

        return $this;
    }

    public function getWednesdayClose(): ?\DateTimeInterface
    {
        return $this->wednesday_close;
    }

    public function setWednesdayClose(\DateTimeInterface $wednesday_close): static
    {
        $this->wednesday_close = $wednesday_close;

        return $this;
    }

    public function getThursdayOpen(): ?\DateTimeInterface
    {
        return $this->thursday_open;
    }

    public function setThursdayOpen(\DateTimeInterface $thursday_open): static
    {
        $this->thursday_open = $thursday_open;

        return $this;
    }

    public function getThursdayClose(): ?\DateTimeInterface
    {
        return $this->thursday_close;
    }

    public function setThursdayClose(\DateTimeInterface $thursday_close): static
    {
        $this->thursday_close = $thursday_close;

        return $this;
    }

    public function getFridayOpen(): ?\DateTimeInterface
    {
        return $this->friday_open;
    }

    public function setFridayOpen(\DateTimeInterface $friday_open): static
    {
        $this->friday_open = $friday_open;

        return $this;
    }

    public function getFridayClose(): ?\DateTimeInterface
    {
        return $this->friday_close;
    }

    public function setFridayClose(\DateTimeInterface $friday_close): static
    {
        $this->friday_close = $friday_close;

        return $this;
    }

    public function getSaturdayOpen(): ?\DateTimeInterface
    {
        return $this->saturday_open;
    }

    public function setSaturdayOpen(\DateTimeInterface $saturday_open): static
    {
        $this->saturday_open = $saturday_open;

        return $this;
    }

    public function getSaturdayClose(): ?\DateTimeInterface
    {
        return $this->saturday_close;
    }

    public function setSaturdayClose(\DateTimeInterface $saturday_close): static
    {
        $this->saturday_close = $saturday_close;

        return $this;
    }

    public function getSundayOpen(): ?\DateTimeInterface
    {
        return $this->sunday_open;
    }

    public function setSundayOpen(\DateTimeInterface $sunday_open): static
    {
        $this->sunday_open = $sunday_open;

        return $this;
    }

    public function getSundayClose(): ?\DateTimeInterface
    {
        return $this->sunday_close;
    }

    public function setSundayClose(\DateTimeInterface $sunday_close): static
    {
        $this->sunday_close = $sunday_close;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
