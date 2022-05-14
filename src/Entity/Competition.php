<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
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
     * @ORM\Column(type="decimal", precision=10, scale=3)
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
     * @ORM\ManyToOne(targetEntity=style::class, inversedBy="competitions")
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=gender::class, inversedBy="competitions")
     */
    private $gender;

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
}
