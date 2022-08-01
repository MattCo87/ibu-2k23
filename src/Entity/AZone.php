<?php

namespace App\Entity;

use App\Repository\AZoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AZoneRepository::class)
 */
class AZone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=athlete::class, inversedBy="aZones")
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=zone::class, inversedBy="aZones")
     */
    private $zone;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3)
     */
    private $timeZone;

    /**
     * @ORM\Column(type="date")
     */
    private $dateZone;

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

    public function getZone(): ?zone
    {
        return $this->zone;
    }

    public function setZone(?zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getDateZone(): ?\DateTimeInterface
    {
        return $this->dateZone;
    }

    public function setDateZone(\DateTimeInterface $dateZone): self
    {
        $this->dateZone = $dateZone;

        return $this;
    }
}
