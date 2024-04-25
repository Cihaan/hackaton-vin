<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['reservation:read']],
    denormalizationContext: ['groups' => ['reservation:write']]
)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['reservation:read','reservation:write'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    #[Groups(['reservation:read','reservation:write'])]
    public ?bool $isConfirmed = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[Groups(['reservation:read','reservation:write'])]
    private ?User $drinker = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[Groups(['reservation:read','reservation:write'])]
    private ?Workshop $workshop = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isConfirmed(): ?bool
    {
        return $this->isConfirmed;
    }

    public function setConfirmed(bool $isConfirmed): static
    {
        $this->isConfirmed = $isConfirmed;

        return $this;
    }

    public function getDrinker(): ?User
    {
        return $this->drinker;
    }

    public function setDrinker(?User $drinker): static
    {
        $this->drinker = $drinker;

        return $this;
    }

    public function getWorkshop(): ?Workshop
    {
        return $this->workshop;
    }

    public function setWorkshop(?Workshop $workshop): static
    {
        $this->workshop = $workshop;

        return $this;
    }
}
