<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank (message: 'Le nom de la catégorie de service ne peut pas être vide')]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le nom de la catégorie de service doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom de la catégorie de service doit contenir au maximum {{ limit }} caractères')]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank (message: 'Le prix du service ne peut pas être vide')]
    #[Assert\Positive (message: 'Le prix du service doit être positif')]
    private ?int $price = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ServiceCategory $service_category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getServiceCategory(): ?ServiceCategory
    {
        return $this->service_category;
    }

    public function setServiceCategory(?ServiceCategory $service_category): static
    {
        $this->service_category = $service_category;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
