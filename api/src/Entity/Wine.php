<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\WineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WineRepository::class)]
#[ApiResource]
class Wine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $year = null;


    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, Workshop>
     */
    #[ORM\ManyToMany(targetEntity: Workshop::class, mappedBy: 'wines')]
    private Collection $workshops;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    private ?Domain $domain = null;

    #[ORM\Column(length: 10000)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?int $serviceTemperature = null;

    #[ORM\Column(length: 255)]
    private ?string $serviceKind = null;

    #[ORM\Column(length: 255)]
    private ?string $conservation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $limiteDate = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $grapeVariety = [];

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->workshops = new ArrayCollection();
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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Workshop>
     */
    public function getWorkshops(): Collection
    {
        return $this->workshops;
    }

    public function addWorkshop(Workshop $workshop): static
    {
        if (!$this->workshops->contains($workshop)) {
            $this->workshops->add($workshop);
            $workshop->addWine($this);
        }

        return $this;
    }

    public function removeWorkshop(Workshop $workshop): static
    {
        if ($this->workshops->removeElement($workshop)) {
            $workshop->removeWine($this);
        }

        return $this;
    }

    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(?Domain $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getServiceTemperature(): ?int
    {
        return $this->serviceTemperature;
    }

    public function setServiceTemperature(int $serviceTemperature): static
    {
        $this->serviceTemperature = $serviceTemperature;

        return $this;
    }

    public function getServiceKind(): ?string
    {
        return $this->serviceKind;
    }

    public function setServiceKind(string $serviceKind): static
    {
        $this->serviceKind = $serviceKind;

        return $this;
    }

    public function getConservation(): ?string
    {
        return $this->conservation;
    }

    public function setConservation(string $conservation): static
    {
        $this->conservation = $conservation;

        return $this;
    }

    public function getLimiteDate(): ?\DateTimeInterface
    {
        return $this->limiteDate;
    }

    public function setLimiteDate(\DateTimeInterface $limiteDate): static
    {
        $this->limiteDate = $limiteDate;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getGrapeVariety(): array
    {
        return $this->grapeVariety;
    }

    public function setGrapeVariety(array $grapeVariety): static
    {
        $this->grapeVariety = $grapeVariety;

        return $this;
    }
}
