<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\WorkshopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: WorkshopRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['workshop:read']],
    denormalizationContext: ['groups' => ['workshop:write']]
)]
class Workshop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['workshop:read','workshop:write','reservation:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write', 'reservation:read'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?int $limitDrinker = null;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?string $password = null;

    /**
     * @var Collection<int, Wine>
     */
    #[ORM\ManyToMany(targetEntity: Wine::class, inversedBy: 'workshops')]
    #[Groups(['workshop:read','workshop:write'])]
    private Collection $wines;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\ManyToOne(inversedBy: 'workshops')]
    #[Groups(['workshop:read','workshop:write'])]
    private ?School $school = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    #[Assert\Type(Boolean::class)]
    #[Groups(['workshop:read','workshop:write'])]
    public ?bool $isCanceled = null;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?string $location = null;

    #[ORM\Column]
    #[Groups(['workshop:read','workshop:write'])]
    private ?int $price = null;

    /**
     * @var string[]
     */
    #[Assert\Json(message: "You've entered an invalid Json.")]
    #[ORM\Column(type: Types::JSON)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?array $theme = null;



    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'workshop')]
    private Collection $reservations;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    public function __construct()
    {
        $this->wines = new ArrayCollection();
        $this->reservations = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getLimitDrinker(): ?int
    {
        return $this->limitDrinker;
    }

    public function setLimitDrinker(?int $limitDrinker): static
    {
        $this->limitDrinker = $limitDrinker;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Wine>
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWine(Wine $wine): static
    {
        if (!$this->wines->contains($wine)) {
            $this->wines->add($wine);
        }

        return $this;
    }

    public function removeWine(Wine $wine): static
    {
        $this->wines->removeElement($wine);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTimeInterface $deadline): static
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): static
    {
        $this->school = $school;

        return $this;
    }

    public function isCanceled(): ?bool
    {
        return $this->isCanceled;
    }

    public function setCanceled(bool $isCanceled): static
    {
        $this->isCanceled = $isCanceled;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

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

    public function getTheme(): array
    {
        return $this->theme;
    }

    public function setTheme(array $theme): static
    {
        $this->theme = $theme;

        return $this;
    }




    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setWorkshop($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getWorkshop() === $this) {
                $reservation->setWorkshop(null);
            }
        }

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }
}
