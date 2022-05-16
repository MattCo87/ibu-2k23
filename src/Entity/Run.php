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
     * @ORM\Column(type="string")
     */
    private $hourRun;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stepRun;

    /**
     * @ORM\ManyToOne(targetEntity=stage::class, inversedBy="runs")
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity=competition::class, inversedBy="runs")
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity=shot::class, inversedBy="runs")
     */
    private $shot;

    /**
     * @ORM\ManyToOne(targetEntity=zone::class, inversedBy="runs")
     */
    private $zone;

    /**
     * @ORM\OneToMany(targetEntity=Result::class, mappedBy="run")
     */
    private $results;

    public function __construct()
    {
        $this->results = new ArrayCollection();
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

    public function getStepRun(): ?int
    {
        return $this->stepRun;
    }

    public function setStepRun(?int $stepRun): self
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

    public function getShot(): ?shot
    {
        return $this->shot;
    }

    public function setShot(?shot $shot): self
    {
        $this->shot = $shot;

        return $this;
    }

    public function getZone(): ?zone
    {
        return $this->zone;
    }

    public function setZone(?zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return Collection<int, Result>
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setRun($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->removeElement($result)) {
            // set the owning side to null (unless already changed)
            if ($result->getRun() === $this) {
                $result->setRun(null);
            }
        }

        return $this;
    }
}
