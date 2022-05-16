<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultRepository::class)
 */
class Result
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=athlete::class, inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=run::class, inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $run;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $positionRun;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shotSuccessC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shotSuccessD;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shotTryC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shotTryD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeShot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timePenalty;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeRun;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeSki;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAthlete(): ?athlete
    {
        return $this->athlete;
    }

    public function setAthlete(?athlete $athlete): self
    {
        $this->athlete = $athlete;

        return $this;
    }

    public function getRun(): ?run
    {
        return $this->run;
    }

    public function setRun(?run $run): self
    {
        $this->run = $run;

        return $this;
    }

    public function getPositionRun(): ?string
    {
        return $this->positionRun;
    }

    public function setPositionRun(?string $positionRun): self
    {
        $this->positionRun = $positionRun;

        return $this;
    }

    public function getShotSuccessC(): ?int
    {
        return $this->shotSuccessC;
    }

    public function setShotSuccessC(?int $shotSuccessC): self
    {
        $this->shotSuccessC = $shotSuccessC;

        return $this;
    }

    public function getShotSuccessD(): ?int
    {
        return $this->shotSuccessD;
    }

    public function setShotSuccessD(?int $shotSuccessD): self
    {
        $this->shotSuccessD = $shotSuccessD;

        return $this;
    }

    public function getShotTryC(): ?int
    {
        return $this->shotTryC;
    }

    public function setShotTryC(?int $shotTryC): self
    {
        $this->shotTryC = $shotTryC;

        return $this;
    }

    public function getShotTryD(): ?int
    {
        return $this->shotTryD;
    }

    public function setShotTryD(?int $shotTryD): self
    {
        $this->shotTryD = $shotTryD;

        return $this;
    }

    public function getTimeShot(): ?string
    {
        return $this->timeShot;
    }

    public function setTimeShot(?string $timeShot): self
    {
        $this->timeShot = $timeShot;

        return $this;
    }

    public function getTimePenalty(): ?string
    {
        return $this->timePenalty;
    }

    public function setTimePenalty(?string $timePenalty): self
    {
        $this->timePenalty = $timePenalty;

        return $this;
    }

    public function getTimeRun(): ?string
    {
        return $this->timeRun;
    }

    public function setTimeRun(?string $timeRun): self
    {
        $this->timeRun = $timeRun;

        return $this;
    }

    public function getTimeSki(): ?string
    {
        return $this->timeSki;
    }

    public function setTimeSki(?string $timeSki): self
    {
        $this->timeSki = $timeSki;

        return $this;
    }
}
