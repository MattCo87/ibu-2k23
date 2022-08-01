<?php

namespace App\Entity;

use App\Repository\RunRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RunRepository::class)
 */
class Run
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRun;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hourRun;

    /**
     * @ORM\Column(type="boolean")
     */
    private $stepRun;

    /**
     * @ORM\ManyToOne(targetEntity=Stage::class, inversedBy="runs")
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="runs")
     */
    private $competition;

    /**
     * @ORM\ManyToMany(targetEntity=Zone::class, inversedBy="runs")
     */
    private $zone;

    /**
     * @ORM\ManyToMany(targetEntity=Shot::class, inversedBy="runs")
     */
    private $shot;

    public function __construct()
    {
        $this->zone = new ArrayCollection();
        $this->shot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRun(): ?\DateTimeInterface
    {
        return $this->dateRun;
    }

    public function setDateRun(\DateTimeInterface $dateRun): self
    {
        $this->dateRun = $dateRun;

        return $this;
    }

    public function getHourRun(): ?string
    {
        return $this->hourRun;
    }

    public function setHourRun(string $hourRun): self
    {
        $this->hourRun = $hourRun;

        return $this;
    }

    public function isStepRun(): ?bool
    {
        return $this->stepRun;
    }

    public function setStepRun(bool $stepRun): self
    {
        $this->stepRun = $stepRun;

        return $this;
    }

    public function getStage(): ?stage
    {
        return $this->stage;
    }

    public function setStage(?stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getCompetition(): ?competition
    {
        return $this->competition;
    }

    public function setCompetition(?competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * @return Collection<int, zone>
     */
    public function getZone(): Collection
    {
        return $this->zone;
    }

    public function addZone(zone $zone): self
    {
        if (!$this->zone->contains($zone)) {
            $this->zone[] = $zone;
        }

        return $this;
    }

    public function removeZone(zone $zone): self
    {
        $this->zone->removeElement($zone);

        return $this;
    }

    /**
     * @return Collection<int, shot>
     */
    public function getShot(): Collection
    {
        return $this->shot;
    }

    public function addShot(shot $shot): self
    {
        if (!$this->shot->contains($shot)) {
            $this->shot[] = $shot;
        }

        return $this;
    }

    public function removeShot(shot $shot): self
    {
        $this->shot->removeElement($shot);

        return $this;
    }
}
