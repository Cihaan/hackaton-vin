<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SchoolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SchoolRepository::class)]
#[ApiResource]
class School
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
   #[Groups(['workshop:read','workshop:write'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
   #[Groups(['workshop:read','workshop:write'])]
    private ?string $name = null;

    /**
     * @var Collection<int, Workshop>
     */
    #[ORM\OneToMany(targetEntity: Workshop::class, mappedBy: 'school')]
    private Collection $workshops;


    public function __construct()
    {
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
            $workshop->setSchool($this);
        }

        return $this;
    }

    public function removeWorkshop(Workshop $workshop): static
    {
        if ($this->workshops->removeElement($workshop)) {
            // set the owning side to null (unless already changed)
            if ($workshop->getSchool() === $this) {
                $workshop->setSchool(null);
            }
        }

        return $this;
    }
}
