<?php

namespace App\Entity;

use App\Repository\AthleteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AthleteRepository::class)
 */
class Athlete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cltG2022;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="athletes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="athletes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="athlete")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=AZone::class, mappedBy="athlete")
     */
    private $aZones;

    /**
     * @ORM\OneToMany(targetEntity=AShot::class, mappedBy="athlete")
     */
    private $aShots;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cltG2023;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->aZones = new ArrayCollection();
        $this->aShots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCltG2022(): ?string
    {
        return $this->cltG2022;
    }

    public function setCltG2022(?string $cltG2022): self
    {
        $this->cltG2022 = $cltG2022;

        return $this;
    }

    public function getGender(): ?gender
    {
        return $this->gender;
    }

    public function setGender(?gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAthlete($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAthlete() === $this) {
                $user->setAthlete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AZone>
     */
    public function getAZones(): Collection
    {
        return $this->aZones;
    }

    public function addAZone(AZone $aZone): self
    {
        if (!$this->aZones->contains($aZone)) {
            $this->aZones[] = $aZone;
            $aZone->setAthlete($this);
        }

        return $this;
    }

    public function removeAZone(AZone $aZone): self
    {
        if ($this->aZones->removeElement($aZone)) {
            // set the owning side to null (unless already changed)
            if ($aZone->getAthlete() === $this) {
                $aZone->setAthlete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AShot>
     */
    public function getAShots(): Collection
    {
        return $this->aShots;
    }

    public function addAShot(AShot $aShot): self
    {
        if (!$this->aShots->contains($aShot)) {
            $this->aShots[] = $aShot;
            $aShot->setAthlete($this);
        }

        return $this;
    }

    public function removeAShot(AShot $aShot): self
    {
        if ($this->aShots->removeElement($aShot)) {
            // set the owning side to null (unless already changed)
            if ($aShot->getAthlete() === $this) {
                $aShot->setAthlete(null);
            }
        }

        return $this;
    }

    public function getCltG2023(): ?int
    {
        return $this->cltG2023;
    }

    public function setCltG2023(?int $cltG2023): self
    {
        $this->cltG2023 = $cltG2023;

        return $this;
    }
}
