<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\WorkshopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
    #[Groups(['workshop:read','workshop:write'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write'])]
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


    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?array $drinkers = null;

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

    #[ORM\Column]
    #[Groups(['workshop:read','workshop:write'])]
    private ?bool $isCanceled = null;

    #[ORM\Column(length: 255)]
    #[Groups(['workshop:read','workshop:write'])]
    private ?string $location = null;

    #[ORM\Column]
    #[Groups(['workshop:read','workshop:write'])]
    private ?int $price = null;

    #[ORM\Column(type: Types::ARRAY)]
    #[Groups(['workshop:read','workshop:write'])]
    private array $image = [];

    #[ORM\Column(type: Types::ARRAY)]
    #[Groups(['workshop:read','workshop:write'])]
    private array $theme = [];

    public function __construct()
    {
        $this->wines = new ArrayCollection();
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

    public function getDrinkers(): ?array
    {
        return $this->drinkers;
    }

    public function setDrinkers(?array $drinkers): static
    {
        error_log("Attempting to set drinkers: " . print_r($drinkers, true));
        $this->drinkers = $drinkers;
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

    public function getImage(): array
    {
        return $this->image;
    }

    public function setImage(array $image): static
    {
        $this->image = $image;

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
}
