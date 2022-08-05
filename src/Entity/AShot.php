<?php

namespace App\Entity;

use App\Repository\AShotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AShotRepository::class)
 */
class AShot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Athlete::class, inversedBy="aShots")
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=Shot::class, inversedBy="aShots")
     */
    private $shot;

    /**
     * @ORM\Column(type="integer")
     */
    private $shotSuccess;

    /**
     * @ORM\Column(type="integer")
     */
    private $shotAttempt;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3)
     */
    private $shotPenalty;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAShot;

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

    public function getShot(): ?shot
    {
        return $this->shot;
    }

    public function setShot(?shot $shot): self
    {
        $this->shot = $shot;

        return $this;
    }

    public function getShotSuccess(): ?int
    {
        return $this->shotSuccess;
    }

    public function setShotSuccess(int $shotSuccess): self
    {
        $this->shotSuccess = $shotSuccess;

        return $this;
    }

    public function getShotAttempt(): ?int
    {
        return $this->shotAttempt;
    }

    public function setShotAttempt(int $shotAttempt): self
    {
        $this->shotAttempt = $shotAttempt;

        return $this;
    }

    public function getShotPenalty(): ?string
    {
        return $this->shotPenalty;
    }

    public function setShotPenalty(string $shotPenalty): self
    {
        $this->shotPenalty = $shotPenalty;

        return $this;
    }

    public function getDateAShot(): ?\DateTimeInterface
    {
        return $this->dateAShot;
    }

    public function setDateAShot(\DateTimeInterface $dateAShot): self
    {
        $this->dateAShot = $dateAShot;

        return $this;
    }
}
