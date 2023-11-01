<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une adresse e-mail')]
    #[Assert\Email(message: 'Veuillez renseigner une adresse e-mail valide')]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner un mot de passe')]
    #[Assert\Length(min: 12, max: 100, minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères', maxMessage: 'Le mot de passe doit contenir au maximum {{ limit }} caractères')]
    #[Assert\Regex(pattern: "/[a-z]/", message: 'Le mot de passe doit contenir au moins une minuscule')]
    #[Assert\Regex(pattern: "/[A-Z]/", message: 'Le mot de passe doit contenir au moins une majuscule')]
    #[Assert\Regex(pattern: "/[0-9]/", message: 'Le mot de passe doit contenir au moins un chiffre')]
    #[Assert\Regex(pattern: "/[!@#$%^&*()\-_=+{};:,<.>]/", message: 'Le mot de passe doit contenir au moins un caractère spécial')]
    private ?string $password = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Garage $garage = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un nom de famille')]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le nom de famille doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom de famille doit contenir au maximum {{ limit }} caractères')]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un prénom')]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le prénom doit contenir au moins {{ limit }} caractères', maxMessage: 'Le prénom doit contenir au maximum {{ limit }} caractères')]
    private ?string $firstname = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?bool $first_time_login = null;

    #[ORM\OneToMany(mappedBy: 'employee_id', targetEntity: Car::class)]
    private Collection $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getGarage(): ?garage
    {
        return $this->garage;
    }

    public function setGarage(?garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

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

    public function isFirstTimeLogin(): ?bool
    {
        return $this->first_time_login;
    }

    public function setFirstTimeLogin(bool $first_time_login): static
    {
        $this->first_time_login = $first_time_login;

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
    public function setFirstTimeLoginValue(): void
    {
        if ($this->first_time_login === null) {
             $this->first_time_login = true;
        }

    }

    /**
     * @return Collection<int, Car>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): static
    {
        if (!$this->cars->contains($car)) {
            $this->cars->add($car);
            $car->setEmployee($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getEmployee() === $this) {
                $car->setEmployee(null);
            }
        }

        return $this;
    }

    // Return Lastname when calling User object
    public function __toString(): string
    {
        return $this->getLastName();
    }

}
