<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $employee = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner un prix')]
    #[Assert\Range(min: 0, max: 1000000, notInRangeMessage: 'Le prix doit être compris entre {{ min }} et {{ max }}')]
    private ?int $price = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner une année')]
    #[Assert\Range(min: 1900, max: 2100, notInRangeMessage: 'L\'année doit être comprise entre {{ min }} et {{ max }}')]
    private ?int $year = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner un kilométrage')]
    #[Assert\Range(min: 0, max: 1000000, notInRangeMessage: 'Le kilométrage doit être compris entre {{ min }} et {{ max }}')]
    private ?int $mileage = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une marque')]
    #[Assert\Length(min: 2, max: 50, minMessage: 'La marque doit contenir au moins {{ limit }} caractères', maxMessage: 'La marque doit contenir au maximum {{ limit }} caractères')]
    private ?string $brand = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un modèle')]
    #[Assert\Length(min: 2, max: 50, minMessage: 'Le modèle doit contenir au moins {{ limit }} caractères', maxMessage: 'Le modèle doit contenir au maximum {{ limit }} caractères')]
    private ?string $model = null;

    #[ORM\ManyToMany(targetEntity: Option::class)]
    private Collection $options;

    #[ORM\ManyToMany(targetEntity: Equipment::class)]
    private Collection $equipments;

    #[ORM\OneToMany(mappedBy: 'car', targetEntity: CarImage::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $carImages;

    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->equipments = new ArrayCollection();
        $this->carImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?User
    {
        return $this->employee;
    }

    public function setEmployee(?User $employee): static
    {
        $this->employee = $employee;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
        }

        return $this;
    }

    public function removeOption(Option $option): static
    {
        $this->options->removeElement($option);

        return $this;
    }

    /**
     * @return Collection<int, Equipment>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipment $equipment): static
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments->add($equipment);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        $this->equipments->removeElement($equipment);

        return $this;
    }

    /**
     * @return Collection<int, CarImage>
     */
    public function getCarImages(): Collection
    {
        return $this->carImages;
    }

    public function addCarImage(CarImage $carImage): static
    {
        if (!$this->carImages->contains($carImage)) {
            $this->carImages->add($carImage);
            $carImage->setCar($this);
        }

        return $this;
    }

    public function removeCarImage(CarImage $carImage): static
    {
        if ($this->carImages->removeElement($carImage)) {
            // set the owning side to null (unless already changed)
            if ($carImage->getCar() === $this) {
                $carImage->setCar(null);
            }
        }

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        if ($this->created_at === null) {
             $this->created_at = new \DateTimeImmutable();
        }

    }

    #[ORM\PrePersist]
    public function setUpdatedAtValue(): void
    {
        if ($this->updated_at === null) {
             $this->updated_at = new \DateTimeImmutable();
        }

    }
}
