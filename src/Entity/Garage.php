<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GarageRepository::class)]
class Garage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'garage_id', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'garage', targetEntity: ServiceCategory::class, orphanRemoval: true)]
    private Collection $serviceCategories;

    #[ORM\OneToOne(mappedBy: 'garage', cascade: ['persist', 'remove'])]
    private ?OpeningHour $openingHour = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->serviceCategories = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setGarage($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getGarage() === $this) {
                $user->setGarage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ServiceCategory>
     */
    public function getServiceCategories(): Collection
    {
        return $this->serviceCategories;
    }

    public function addServiceCategory(ServiceCategory $serviceCategory): static
    {
        if (!$this->serviceCategories->contains($serviceCategory)) {
            $this->serviceCategories->add($serviceCategory);
            $serviceCategory->setGarage($this);
        }

        return $this;
    }

    public function removeServiceCategory(ServiceCategory $serviceCategory): static
    {
        if ($this->serviceCategories->removeElement($serviceCategory)) {
            // set the owning side to null (unless already changed)
            if ($serviceCategory->getGarage() === $this) {
                $serviceCategory->setGarage(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getOpeningHour(): ?OpeningHour
    {
        return $this->openingHour;
    }

    public function setOpeningHour(OpeningHour $openingHour): static
    {
        // set the owning side of the relation if necessary
        if ($openingHour->getGarage() !== $this) {
            $openingHour->setGarage($this);
        }

        $this->openingHour = $openingHour;

        return $this;
    }
}
