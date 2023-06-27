<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length:255 , options:['default' => 'En attente'])]
    private ?string $status = null;

    #[ORM\Column]
    private ?DateTimeImmutable $created_at;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $updated_at;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: Enterprise::class)]
    private Collection $enterprises;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: Offers::class)]
    private Collection $offers;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: Candidacy::class)]
    private Collection $candidacies;

    public function __construct()
    {
        $this->created_at = new DateTimeImmutable();
        $this->updated_at = new DateTime();
        $this->enterprises = new ArrayCollection();
        $this->offers = new ArrayCollection();
        $this->candidacies = new ArrayCollection();
        $this->status = "En attente";
    }

    #[ORM\PreUpdate]
    public function updateDate(): void
    {
        $this->updated_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Enterprise>
     */
    public function getEnterprises(): Collection
    {
        return $this->enterprises;
    }

    public function addEnterprise(Enterprise $enterprise): static
    {
        if (!$this->enterprises->contains($enterprise)) {
            $this->enterprises->add($enterprise);
            $enterprise->setStatus($this);
        }

        return $this;
    }

    public function removeEnterprise(Enterprise $enterprise): static
    {
        if ($this->enterprises->removeElement($enterprise)) {
            // set the owning side to null (unless already changed)
            if ($enterprise->getStatus() === $this) {
                $enterprise->setStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Offers>
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offers $offer): static
    {
        if (!$this->offers->contains($offer)) {
            $this->offers->add($offer);
            $offer->setStatus($this);
        }

        return $this;
    }

    public function removeOffer(Offers $offer): static
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getStatus() === $this) {
                $offer->setStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidacy>
     */
    public function getCandidacies(): Collection
    {
        return $this->candidacies;
    }

    public function addCandidacy(Candidacy $candidacy): static
    {
        if (!$this->candidacies->contains($candidacy)) {
            $this->candidacies->add($candidacy);
            $candidacy->setStatus($this);
        }

        return $this;
    }

    public function removeCandidacy(Candidacy $candidacy): static
    {
        if ($this->candidacies->removeElement($candidacy)) {
            // set the owning side to null (unless already changed)
            if ($candidacy->getStatus() === $this) {
                $candidacy->setStatus(null);
            }
        }
        return $this;
    }


    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->status;
    }
}
