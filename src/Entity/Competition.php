<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
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
    private $nameCompetition;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3)
     */
    private $stepDistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $stepNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $shotNumber;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="competitions")
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="competitions")
     */
    private $gender;

    /**
     * @ORM\OneToMany(targetEntity=Run::class, mappedBy="competition")
     */
    private $runs;

    public function __construct()
    {
        $this->runs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCompetition(): ?string
    {
        return $this->nameCompetition;
    }

    public function setNameCompetition(string $nameCompetition): self
    {
        $this->nameCompetition = $nameCompetition;

        return $this;
    }

    public function getStepDistance(): ?string
    {
        return $this->stepDistance;
    }

    public function setStepDistance(string $stepDistance): self
    {
        $this->stepDistance = $stepDistance;

        return $this;
    }

    public function getStepNumber(): ?int
    {
        return $this->stepNumber;
    }

    public function setStepNumber(int $stepNumber): self
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }

    public function getShotNumber(): ?int
    {
        return $this->shotNumber;
    }

    public function setShotNumber(int $shotNumber): self
    {
        $this->shotNumber = $shotNumber;

        return $this;
    }

    public function getStyle(): ?style
    {
        return $this->style;
    }

    public function setStyle(?style $style): self
    {
        $this->style = $style;

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

    /**
     * @return Collection<int, Run>
     */
    public function getRuns(): Collection
    {
        return $this->runs;
    }

    public function addRun(Run $run): self
    {
        if (!$this->runs->contains($run)) {
            $this->runs[] = $run;
            $run->setCompetition($this);
        }

        return $this;
    }

    public function removeRun(Run $run): self
    {
        if ($this->runs->removeElement($run)) {
            // set the owning side to null (unless already changed)
            if ($run->getCompetition() === $this) {
                $run->setCompetition(null);
            }
        }

        return $this;
    }
}
